<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'string', 'min:2', 'max:16', 'unique:users'],
            'name' => ['required', 'string', 'min:6', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults(),
            'g-recaptcha-response' => 'required:captcha',
        ],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['banned'] = false;

        $user = User::create($formFields);

        event(new Registered($user));

        auth()->login($user);

        // Add Log

        return redirect(RouteServiceProvider::HOME);
    }
}
