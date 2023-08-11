<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

Route::middleware('guest')->group(function(){
    Route::get('/', [SessionController::class, 'register'])->name('register');
    Route::get('/login', [SessionController::class, 'loginView'])->name('login');
    Route::post('/login', [SessionController::class, 'loginCheck'])->name('loginCheck');
});


Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [UserController::class, 'users'])->name('users');
    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
});

//AJAX ROUtes
Route::middleware('auth:admin')->group(function (){

});

