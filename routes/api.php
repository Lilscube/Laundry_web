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
    Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
    // Route::get('/users/UserPage/indexProfileUser', [UserController::class, 'profile'])->name('user.profile');

    Route::post('/layanan/store', [LayananController::class, 'store']);
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    Route::get('/karyawan', [KaryawanController::class, 'viewKaryawan'])->name('karyawan.index');
    Route::post('/karyawan/store', [KaryawanController::class, 'create'])->name('karyawan.store');
    Route::get('/AdminPage/indexAdmin', [AdminController::class, 'index'])->name('admin.index');

    // Route::post('/admin/login', [AdminController::class, 'login'])->name('login');
    // Route::match(['post'], '/admin/login', [AdminController::class, 'login']);
    Route::post('/admin/logout', [AdminController::class, 'logout']);

    Route::post('/logout', [UserController::class, 'logout']);

    
});





Route::post('/admin/register', [AdminController::class, 'register']);
// Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
// Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');


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
    // Route::post('/store', [LayananController::class, 'store']);
    Route::get('/tampilRiwayat', [LayananController::class, 'tampilRiwayat'])->name('layanan.riwayat');
    

});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/create', [KaryawanController::class, 'create']);



// Route::prefix('admin')->group(function () {
//     Route::post('/register', [AdminController::class, 'register']);
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// <?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\KaryawanController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\LayananController;

// // Route untuk User
// Route::post('/register', [UserController::class, 'register'])->name('api.register.user');
// Route::post('/login', [UserController::class, 'login']);

// // Route untuk Admin
// Route::post('/admin/register', [AdminController::class, 'register']);
// Route::post('/admin/login', [AdminController::class, 'login'])->name('login'); // Tambahkan nama 'login'

// // Route dengan Middleware auth:sanctum
// Route::middleware('auth:sanctum')->group(function () {

//     // Route untuk User
//     Route::put('/user/update/{id}', [UserController::class, 'update']);
//     Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
//     Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
//     Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
//     Route::get('/UserPage/indexProfileUser', [UserController::class, 'profile'])->name('user.profile');
//     Route::post('/logout', [UserController::class, 'logout']);

//     // Route untuk Karyawan
//     Route::prefix('karyawan')->group(function () {
//         Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
//         Route::post('/store', [KaryawanController::class, 'create'])->name('karyawan.store');
//         Route::get('/{id}', [KaryawanController::class, 'show']);
//         Route::put('/update/{id}', [KaryawanController::class, 'update']);
//         Route::delete('/delete/{id}', [KaryawanController::class, 'delete']);
//     });

//     // Route untuk Layanan
//     Route::prefix('layanan')->group(function () {
//         Route::post('/create', [LayananController::class, 'create']);
//         Route::get('/', [LayananController::class, 'index']);
//         Route::get('/{id}', [LayananController::class, 'show']);
//         Route::delete('/{id}', [LayananController::class, 'destroy']);
//     });

//     // Route untuk Admin
//     Route::get('/AdminPage/indexAdmin', [AdminController::class, 'index'])->name('admin.index');
//     Route::post('/admin/logout', [AdminController::class, 'logout']);
// });


// Route untuk User
// Route::post('/register', [UserController::class, 'register'])->name('api.register.user');
// Route::post('/login', [UserController::class, 'login'])->name('api.login');

// // Route untuk Admin
// Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
// Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// // Protected routes menggunakan middleware auth:sanctum
// Route::middleware('auth:sanctum')->group(function () {
    
//     // **User Routes**
//     Route::prefix('user')->group(function () {
//         Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
//         Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
//         Route::get('/', [UserController::class, 'index'])->name('user.index');
//         Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
//         Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
//         Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
//     });

//     // **Admin Routes**
//     Route::prefix('admin')->group(function () {
//         Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
//         Route::post('/login', [AdminController::class, 'login']);
//         Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//     });

//     // **Karyawan Routes**
//     Route::prefix('karyawan')->group(function () {
//         Route::post('/create', [KaryawanController::class, 'create'])->name('karyawan.create');
//         Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
//         Route::get('/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
//         Route::put('/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
//         Route::delete('/delete/{id}', [KaryawanController::class, 'delete'])->name('karyawan.delete');
//     });

//     // **Layanan Routes**
//     Route::prefix('layanan')->group(function () {
//         Route::post('/create', [LayananController::class, 'create'])->name('layanan.create');
//         Route::get('/', [LayananController::class, 'index'])->name('layanan.index');
//         Route::get('/{id}', [LayananController::class, 'show'])->name('layanan.show');
//         Route::delete('/{id}', [LayananController::class, 'destroy'])->name('layanan.delete');
//         Route::get('/riwayat', [LayananController::class, 'tampilRiwayat'])->name('layanan.riwayat');
//     });
// });

// // Tes Middleware jika diperlukan
// Route::get('/test-auth', function (Request $request) {
//     return response()->json(['user' => $request->user()]);
// })->middleware('auth:sanctum');
