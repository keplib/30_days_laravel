<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth/create');
    }

    public function store()
    {
        dd(request()->all());
    }
}
