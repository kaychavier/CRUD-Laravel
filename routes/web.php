<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('/auth')->group(function(){
    Route::resource('/register', RegisterController::class)->names([
        'index'=>'register',
        'store'=>'register.store'
    ])->only(['index', 'store']);

    Route::resource('/login', LoginController::class)->names([
        'index'=>'login',
        'store'=>'login.store'
    ])->only(['index', 'store']);
});
Route::middleware('auth')->group(function(){
    Route::get('/', HomeController::class)->name('home');
    Route::post('/auth/logout', LogoutController::class)->name('logout');
    Route::resource('/person', PersonController::class);
});
