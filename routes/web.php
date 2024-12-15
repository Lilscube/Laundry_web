<?php

use Illuminate\Support\Facades\Route;


// Redirect root '/' ke route 'home'
Route::get('/', function () {
    return redirect()->route('home');
});

// Route untuk Homepage
Route::get('/Home', function () {
    return view('Home.Homepage');
})->name('home');

// Route untuk MainLogin
Route::get('/MainLogin', function () {
    return view('Home.MainLogin');
})->name('mainlogin');

// Route untuk Login
Route::get('/UserLogin', function () {
    return view('Home.UserLogin');
})->name('userlogin');

// Route untuk Login
Route::get('/AdminLogin', function () {
    return view('Home.AdminLogin');
})->name('adminlogin');
