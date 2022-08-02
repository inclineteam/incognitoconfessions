<?php

namespace App\Http\Controllers;

use App\Models\Confessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

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

    public function create()
    {
        return view('pages.create-confession-page');
    }

    public function destroy($id){
        $confession = Confessions::find($id);
        $confession->delete();
        return redirect()->route('home');
    }

    public function update(){

    }

    public function show(){
        $confessions = Confessions::where("UserID", auth()->user()->id)->paginate(5);
        return view('pages.userinfo', ["confessions" => $confessions]);
    }
}