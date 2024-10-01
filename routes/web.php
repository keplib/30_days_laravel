<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Comment;

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

Route::get('/comments', function () {
    return view('comments', [
        'comments' => Comment::all()
    ]);
});

Route::get('/comments/{id}', function ($id) {
    return view('comment', [
        'comment' => Comment::find($id)
    ]);
});


Route::get('/jobs/{id}', function ($id) {

    return view('job', ['job' => Job::find($id)]);
});

