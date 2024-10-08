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

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs/create');
});

Route::get('/jobs/{id}', function ($id) {

    return view('jobs/show', ['job' => Job::find($id)]);
});

Route::get('/departments', function () {
    return view('departments', ['departments' => Department::all()]);
});

Route::post('/jobs', function () {

    request()->validate([
        'title'=> ['required', 'min:3'],
        'salary'=> ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/departments/{id}', function ($id) {

    $employees = Department::find($id)->employees;

    return view('department', ['employees' => $employees]);
});

