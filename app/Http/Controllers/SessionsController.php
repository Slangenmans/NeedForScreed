<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => ['nullable', 'confirm'],
        ]);

        if (Auth::attempt(Arr::only($credentials, ['email', 'password']), $credentials['remember_me'] ?? false)) {
            $request->session()->regenerate();

            return redirect()->intended(route('projects.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy()
    {
        // return dd('Logged out');
        auth()->logout();

        // ->with - Flash a piece of data to the session
        return redirect('/')->with('Logout succesful ~');
    }
}
