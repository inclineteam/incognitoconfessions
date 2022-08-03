<?php

namespace App\Http\Controllers;

use App\Models\Confessions;
use Illuminate\Http\Request;

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
        return redirect()->route('home');

    }

    public function destroy($id){
        $confession = Confessions::find($id);
        $confession->delete();
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
        return redirect()->route('home');
    }

    public function show(){
        if(auth()->user()){
            $confessions = Confessions::where("UserID", auth()->user()->id)->paginate(4);
            return view('pages.userinfo', ["confessions" => $confessions]);
        } else {
            return view('pages.userinfo', ["confessions" => []]);
        }
        
    }
}