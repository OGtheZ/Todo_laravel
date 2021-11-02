<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function showForm()
    {
        return view('registerUserForm');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:4', 'max:255'],
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);

        return redirect('/')->with('success', 'Account created!');
    }
}
