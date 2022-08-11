<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use App\Models\ConfessionLimit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfessionController extends Controller
{
    public function create()
    {
        return view('pages.confession.create');
    }

    public function index()
    {
        $confessions = [];

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

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:16'],
            'to' => ['required', 'min:3', 'max:16'],
            'content' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        $formFields['user_id'] = auth()->id();

        Confession::create($formFields);

        $onTable = count(ConfessionLimit::where("user_id", auth()->user()->id)->get());

        if ($onTable > 0) {

            $limit = ConfessionLimit::where("user_id", auth()->user()->id)->first();

            if ($limit->confessions_count >= 50) {
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
