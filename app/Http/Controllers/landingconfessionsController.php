<?php

namespace App\Http\Controllers;

use App\Models\Confessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class landingconfessionsController extends Controller
{
    public function index(){
        // query first 15 confessions
        $confessions = Confessions::orderBy('id', 'desc')->take(15)->get();
        return view('pages.landing', ["confessions" => $confessions]);
    }

    public function confessions(){
        $confessions = DB::table('confessions')->paginate(15);
        
        return view('pages.view-confessions-page', ["confessions" => $confessions]);
    }
}
