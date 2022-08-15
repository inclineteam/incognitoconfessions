<?php

namespace App\Http\Controllers;

use App\Models\Confession;

class LandingController extends Controller
{
    public function index()
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
    }

    public function source()
    {
        // redirect
    }
}
