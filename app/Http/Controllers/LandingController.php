<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // query first 15 confessions
        $confessions = Confession::orderBy('id', 'desc')->take(15)->get();
        return view('pages.landing', ["confessions" => $confessions]);
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function discord()
    {
        // redirect
        return redirect()->back(); 
    }

    public function facebook()
    {
        // redirect
        return redirect()->back(); 
    }

    public function github()
    {
        // redirect
        return redirect()->back(); 
    }

    public function report()
    {
        // redirect
        return redirect()->back(); 
    }

    public function source()
    {
        // redirect
        return redirect()->back(); 
    }
}
