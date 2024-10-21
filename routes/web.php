<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Comment;
use App\Models\Department;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;



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
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit-job', 'id');
Route::delete('/jobs/{id}', [JobController::class, 'destroy']);
Route::patch('/jobs/{id}', [JobController::class, 'update']);


Route::get('/departments', function () {
    return view('departments', ['departments' => Department::all()]);
});

Route::get('/departments/{id}', function ($id) {

    $employees = Department::find($id)->employees;

    return view('department', ['employees' => $employees]);
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
