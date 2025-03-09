<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuhController; 
Route::get('/', function () {
    return view('welcome');
})->name('home');

//authentification
Route::get('/signup',[AuhController::class,'index'])->name('Auth.signup');
Route::post('/signup',[AuhController::class,'store'])->name('Auth.store');;
Route::get('/signin',[AuhController::class,'index2'])->name('Auth.signin');
Route::post('/signin',[AuhController::class,'check'])->name('Auth.check');