<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Comment;
use App\Models\Department;
use App\Http\Controllers\JobController;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Route::get('/home', function () {
//     return view('home', [
//          'greeting' => 'Hello',
//     ]);
// });


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{id}/edit', [JobController::class, 'edit']);
Route::delete('/jobs/{id}', [JobController::class, 'destroy']);
Route::patch('/jobs/{id}', [JobController::class, 'update']);


Route::get('/departments', function () {
    return view('departments', ['departments' => Department::all()]);
});

Route::get('/departments/{id}', function ($id) {

    $employees = Department::find($id)->employees;

    return view('department', ['employees' => $employees]);
});

