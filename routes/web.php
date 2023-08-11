<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

Route::middleware(['danie_if_admin', 'guest' ])->group(function(){
    Route::get('/', [SessionController::class, 'register'])->name('register');
    Route::post('/register', [SessionController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [SessionController::class, 'loginView'])->name('login');
    Route::post('/login', [SessionController::class, 'loginCheck'])->name('loginCheck');
});


Route::middleware('admin_or_web')->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('users/data', [UserController::class, 'getUsers'])->name('users.data');
});

//AJAX ROUtes
Route::middleware('auth:admin')->group(function (){

});

