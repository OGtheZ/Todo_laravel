<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        $attributes = \request()->validate([
            'email' => ['required', 'exists:users,email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/tasks');
        }

        return back()->withErrors(['password' => 'The password is incorrect!']);

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Logged out!');
    }
}
