<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        // Create a user
        $attributes = $request->validate([
            'name' => ['required', 'max:255'],
            // 'username' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        $user = User::make($attributes);
        $user->password = Hash::make($attributes['password']);
        $user->save();

        // Displays alert that user has been registered
        session()->flash('success', 'Your account has been created.');

        // Log the user in 
        auth()->login($user);

        return to_route('home');
    }
}
