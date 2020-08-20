<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email','password']);

        if (auth()->attempt($credentials, $request->has('remember_me'))) {

            return redirect()->route('postings.index')->with('success', 'Welcome back.');

        } else {

            return redirect()->route('auth.getLogin')->with('error', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('auth.getLogin')->with('success', 'Bye, bye.');
    }
}
