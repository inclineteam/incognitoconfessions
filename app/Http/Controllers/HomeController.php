<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // show home page
    public function show()
    {

        $confessions = auth()->user() ? auth()->user()->confessions : [];

        return view('pages.home', [
            'confessions' => $confessions,
        ]);
    }
}
