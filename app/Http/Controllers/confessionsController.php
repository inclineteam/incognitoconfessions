<?php

namespace App\Http\Controllers;

use App\Models\Confessions;
use App\Models\confessions_limits;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class confessionsController extends Controller
{
    public function index()
    {
        // query first 15 confessions
        $confessions = Confessions::orderBy('id', 'desc')->take(15)->get();
        return view('pages.landing', ["confessions" => $confessions]);
    }

    public function confessions()
    {
        $confessions = Confessions::latest()->filter(request(['search']))->paginate(15);
        return view('pages.view-confessions-page', ["confessions" => $confessions]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'to' => 'required',
            'content' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        $confession = new Confessions();
        $confession->name = $request->name;
        $confession->to = $request->to;
        $confession->content = $request->content;
        $confession->userID = auth()->user()->id;
        $confession->save();

        $onTable = count(confessions_limits::where("userID", auth()->user()->id)->get());

        if($onTable > 0){

            $limit = confessions_limits::where("userID", auth()->user()->id)->first();

            if($limit->confessionsCount >= 100 ){
                // ban
                DB::table('users')->where("id", auth()->user()->id)->update(['banned' => 1]);
                
            } else {

                // TODO check time 

                if(time() - date_timestamp_get($limit->created_at) > 3600){
                    DB::table('confessions_limits')->where("userID", auth()->user()->id)->update(["created_at" => Carbon::createFromTimestamp(time())]);
                    DB::table('confessions_limits')->where("userID", auth()->user()->id)->update(["confessionsCount" => 1]);
                } else {
                    DB::table('confessions_limits')->where("userID", auth()->user()->id)->update(["confessionsCount" => $limit->confessionsCount + 1]);
                }
            }

        } else {

            $limit = new confessions_limits();
            $limit->confessionsCount = 1;
            $limit->userID = auth()->user()->id;
            $limit->save();
        }

        // add Log

        return redirect()->route('home');

    }

    public function destroy($id){
        $confession = Confessions::find($id);
        $confession->delete();

        // add Log

        return redirect()->route('home');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'to' => 'required',
            'content' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        $confession = Confessions::find($id);
        $confession->name = $request->name;
        $confession->to = $request->to;
        $confession->content = $request->content;
        $confession->userID = auth()->user()->id;
        $confession->update();

        // add Log

        return redirect()->route('home');
    }

    public function show(){
        if(auth()->user()){
            $confessions = Confessions::where("UserID", auth()->user()->id)->paginate(4);
            return view('pages.userinfo', ["confessions" => $confessions, "all" => Confessions::where("UserID", auth()->user()->id)->get()]);
        } else {
            return view('pages.userinfo', ["confessions" => []]);
        }
        
    }
}