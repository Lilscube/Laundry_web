<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderPerHariController;
use App\Http\Controllers\RiwayatTransaksiUserController;
use App\Http\Controllers\TotalTransaksiController;
use App\Http\Controllers\LayananExpressController;
use App\Http\Controllers\LayananRegulerController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
