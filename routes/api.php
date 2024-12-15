<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrderPerHariController;
use App\Http\Controllers\RiwayatTransaksiUserController;
use App\Http\Controllers\TotalTransaksiController;
use App\Http\Controllers\LayananExpressController;
use App\Http\Controllers\LayananRegulerController;

///User//
Route::post('/register', [UserController::class, 'register'])->name('api.register.user');
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
    Route::post('/logout', [UserController::class, 'logout']);

    Route::post('/admin/logout', [AdminController::class, 'logout']);
});

Route::post('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::prefix('karyawan')->group(function () {
    Route::post('/create', [KaryawanController::class, 'create']); // Create
    Route::get('/', [KaryawanController::class, 'index']);         // Read All
    Route::get('/{id}', [KaryawanController::class, 'show']);      // Read Single
    Route::put('/update/{id}', [KaryawanController::class, 'update']); // Update
    Route::delete('/delete/{id}', [KaryawanController::class, 'delete']); // Delete
});

Route::prefix('layanan')->group(function () {
    Route::post('/create', [LayananController::class, 'create']); // Create Layanan
    Route::get('/', [LayananController::class, 'index']);         // Get All Layanan
    Route::get('/{id}', [LayananController::class, 'show']);      // Get Layanan by ID
    Route::delete('/{id}', [LayananController::class, 'destroy']);
});



// Route::prefix('admin')->group(function () {
//     Route::post('/register', [AdminController::class, 'register']);
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
