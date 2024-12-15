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

// Route untuk User Login
Route::get('/UserLogin', function () {
    return view('Home.UserLogin');
})->name('userlogin');

// Route untuk Admin Login
Route::get('/AdminLogin', function () {
    return view('Home.AdminLogin');
})->name('adminlogin');

// Route untuk Registrasi User
Route::get('/RegistrasiUser', function () {
    return view('Home.RegistrasiUser'); 
})->name('register.form');



