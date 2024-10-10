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

// Index
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});

// CREATE
Route::get('/jobs/create', function () {
    return view('jobs/create');
});


// READ
Route::get('/jobs/{id}', function ($id) {

    return view('jobs/show', ['job' => Job::find($id)]);
});

// UPDATE
Route::patch('/jobs/{id}', function ($id) {

    // validate
     request()->validate([
        'title'=> ['required', 'min:3'],
        'salary'=> ['required'],
    ]);

    $job = Job::findOrFail($id);

    $job->title=request('title');
    $job->salary=request('salary');
    $job->save();

    // $job->update([
    //     'title'->request('title'),
    //     'salary'->request('salary')
    // ]);


    return redirect('/jobs/' . $job->id );
});

// DELETE
Route::delete('/jobs/{id}', function ($id) {

    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});


// Store
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

// Edit page
Route::get('/jobs/{id}/edit', function ($id) {

    return view('jobs/edit', ['job' => Job::find($id)]);
});



Route::get('/departments', function () {
    return view('departments', ['departments' => Department::all()]);
});

Route::get('/departments/{id}', function ($id) {

    $employees = Department::find($id)->employees;

    return view('department', ['employees' => $employees]);
});

