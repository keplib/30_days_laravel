<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth/create');
    }

    public function store()
    {
        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5), 'confirmed'],
        ]);

        // cretate the user
        $user = User::create($validatedAttributes);

        //log in
        Auth::login($user);

        // redirect
        return redirect('jobs');
    }
}
