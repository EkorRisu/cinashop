<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Auth::routes();  // Menyediakan semua rute otentikasi default (login, register, logout, dll.)

Route::get('/', action: function () {
    return view('layouts.welcome');
});

Route::get('/login', 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\\Http\\Controllers\\Auth\\LoginController@login');
Route::post('/logout', 'App\\Http\\Controllers\\Auth\\LogoutController@signout')->name('logout');
Route::get('/register', 'App\\Http\\Controllers\\Auth\\RegisterController@registration')->name('register');
Route::post('/register', 'App\\Http\\Controllers\\Auth\\RegisterController@register');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
