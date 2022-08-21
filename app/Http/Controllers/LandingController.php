<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // query first 15 confessions
        $confessions = Cache::remember('confession', 60, function () {
            return Confession::orderBy('id', 'desc')->take(15)->get();
        });
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

    public function terms()
    {
        // redirect
        return view('pages.terms'); 
    }

    public function discord()
    {
        // redirect
        return redirect()->back(); 
    }

    public function facebook()
    {
        // redirect
        return redirect()->to('https://www.facebook.com/incognitoconfessions'); 
    }

    public function report()
    {
        // redirect
        return redirect()->to('report'); 
    }

    public function source()
    {
        // redirect
        return redirect()->to('https://github.com/mmmsss211/Incognito-Confessions'); 
    }
}
