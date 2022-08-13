<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateCredentialsController extends Controller
{
    public function show()
    {
        return view('pages.profile.update-credentials');
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'old' => 'required',
            'new' => 'required',
            'g-recaptcha-response' => 'required:captcha',
        ]);

        if (Hash::check($formFields['old'], auth()->user()->password)) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($formFields['new'])]);
            return redirect()->route('home');
        } else {
            
            return redirect()->back()->withErrors(['old' => 'Old password is incorrect']);  
        }
        
    }
}