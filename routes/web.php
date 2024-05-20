<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::view('/contact', 'contact');

//Jobs
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])
    ->middleware('auth')
    ->can('create', 'App\\Models\Job');
Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth')
    ->can('create', 'App\\Models\Job');
Route::get('/jobs/list/{employer}', [JobController::class, 'list']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'job');


//Post

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->can('create', 'App\\Models\Post');
Route::post('/posts', [PostController::class, 'store'])
    ->middleware('auth')
    ->can('create', 'App\\Models\Post');
Route::get('/posts/list', [PostController::class, 'list'])->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'post');
Route::patch('/posts/{post}', [PostController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'post');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'post');


Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/profile', [RegisterUserController::class, 'edit'])
    ->middleware('auth');
Route::patch('/profile', [RegisterUserController::class, 'update'])
    ->middleware('auth');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
