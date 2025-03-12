<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuhController;
use App\Http\Controllers\MJobsController;
use App\Http\Middleware\Taskmiddlweare;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//authentification
Route::get('/signup',[AuhController::class,'index'])->name('Auth.signup');
Route::post('/signup',[AuhController::class,'store'])->name('Auth.store');;
Route::get('/signin',[AuhController::class,'index2'])->name('Auth.signin');
Route::post('/signin',[AuhController::class,'check'])->name('Auth.check');

//Jobs
Route::get('/tasks/create',[MJobsController::class,'index'])->name('tasks.index');
Route::post('/tasks',[MJobsController::class,'store'])->name('tasks.store')->middleware(Taskmiddlweare::class);;
Route::get('/tasks',[MJobsController::class,'Show'])->name('tasks.show');
Route::get('/tasks  /{task_id}/edit', [MJobsController::class, 'editForm'])->name('tasks.editForm');
Route::put('/tasks/{task_id}', [MJobsController::class, 'edit'])->name('tasks.edit')->middleware(Taskmiddlweare::class);
Route::delete('/tasks/{task_id}', [MJobsController::class, 'delete'])->name('tasks.delete');
