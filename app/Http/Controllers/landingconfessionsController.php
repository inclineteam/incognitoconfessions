<?php

namespace App\Http\Controllers;

use App\Models\Confessions;
use Illuminate\Http\Request;

class landingconfessionsController extends Controller
{
    public function index(){
        // query first 15 confessions
        $confessions = Confessions::orderBy('id', 'desc')->take(15)->get();
        
        return view('pages.landing', ["confessions" => $confessions]);
    }
}
