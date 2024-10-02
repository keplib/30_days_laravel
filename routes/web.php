<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Comment;
use App\Models\Department;

Route::get('/home', function () {
    return view('home', [
         'greeting' => 'Hello',
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {

    return view('job', ['job' => Job::find($id)]);
});

Route::get('/departments', function () {
    return view('departments', ['departments' => Department::all()]);
});

Route::get('/departments/{id}', function ($id) {

    $employees = Department::find($id)->employees;

    return view('department', ['employees' => $employees]);
});

