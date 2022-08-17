<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use App\Models\ConfessionLimit;
use App\Models\Replies;
use App\Models\ReplyLimits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConfessionController extends Controller
{
    public function create()
    {
        return view('pages.confession.create');
    }

    public function index(Request $request)
    {
        $confessions = [];

        if($request->cookie('laravel_cookie_consent') == null){
            // do not let user in if cookie consent is not accepted
            return Redirect::to('/cookie');
        }

        // if there is sort query in request, sort the items, else, get latest items
        if (request('sort')) {
            $confessions = Confession::get()->sortBy(request('sort'))->paginate(15);
        } else {
            $confessions = Confession::latest()->filter(request(['search']))->paginate(15);
        }

        // if sort query is equals to latest, get latest items
        if (request('sort') === 'latest') {
            $confessions = Confession::latest()->filter(request(['search']))->paginate(15);
        }

        return view('pages.confessions', ["confessions" => $confessions]);
    }

    public function cookie(Request $request){
        
        if($request->cookie('laravel_cookie_consent') !== null){
            // do not let user in if cookie consent is accepted already
            return redirect()->back();
        }

        return view('pages.cookie');
    }

    public function confess(Confession $confession)
    {
        return view('pages.confession', ["confession" => $confession]);
    }

    public function react(Confession $confession)
    {
        $reacts = $confession->reacts;
        $reacts_users = $confession->reacts_users;

        if(in_array(auth()->user()->id, $confession->reacts_users)) {
            $reacts_users = array_diff($reacts_users, [auth()->user()->id]);
            $reacts--;
        } else {
            $reacts_users[] = auth()->user()->id;
            $reacts++;
        }

        $confession->update([
            'reacts' => $reacts,
            'reacts_users' => $reacts_users,
        ]);

        return redirect()->back();
    }

    public function reply(Request $request, Confession $confession)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // limit user to reply to confession 5 seconds per minute using session
    
        if(session()->has('reply_limit')){
            $reply_limit = session()->get('reply_limit');
            $now = Carbon::now();
            $diff = $now->diffInSeconds($reply_limit);
            if($diff < 5){
                return redirect()->back()->withErrors(['content' => 'You can reply to confession every 5 seconds']);
            }
        }

        session()->put('reply_limit', Carbon::now());

        Replies::create([

            'confession_id' => $confession->id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        return Redirect::to('/confessions/' . $confession->id . "#comment");
    }

    public function delete(Replies $reply)
    {
        $reply->delete();
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:16'],
            'to' => ['required', 'min:3', 'max:16'],
            'content' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['reacts'] = 0;
        $formFields['reacts_users'] = [];

        Confession::create($formFields);

        $onTable = count(ConfessionLimit::where("user_id", auth()->user()->id)->get());

        if ($onTable > 0) {

            $limit = ConfessionLimit::where("user_id", auth()->user()->id)->first();

            if ($limit->confessions_count >= 100) {
                // ban
                DB::table('users')->where("id", auth()->user()->id)->update(['banned' => true]);

            } else {

                // TODO check time

                if (time() - date_timestamp_get($limit->created_at) > 3600) {
                    DB::table('confession_limits')->where("user_id", auth()->user()->id)->update(["created_at" => Carbon::createFromTimestamp(time())]);
                    DB::table('confession_limits')->where("user_id", auth()->user()->id)->update(["confessions_count" => 1]);
                } else {
                    DB::table('confession_limits')->where("user_id", auth()->user()->id)->update(["confessions_count" => $limit->confessions_count + 1]);
                }
            }

        } else {
            ConfessionLimit::create([
                'user_id' => auth()->user()->id,
                'confessions_count' => 1,
            ]);
        }

        // add Log

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $confession = Confession::find($id);
        $confession->delete();

        // add Log

        return redirect()->route('home');
    }

    public function edit(Confession $confession)
    {
        if ($confession->user_id != auth()->id()) {
            abort(404);
        }

        return view('pages.confession.edit', [
            'confession' => $confession,
        ]);
    }

    public function update(Request $request, Confession $confession)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'to' => 'required',
            'content' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        $confession->update($formFields);

        return redirect()->route('home');
    }
}
