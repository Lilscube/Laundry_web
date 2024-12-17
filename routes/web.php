<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;

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
// Route::get('/login', function () {
//     return view('UserPage.login');
// })->name('login');

// Route untuk Admin Login
Route::get('/AdminLogin', function () {
    return view('Home.AdminLogin');
})->name('adminlogin');

// Route untuk Registrasi User
Route::get('/RegistrasiUser', function () {
    return view('Home.RegistrasiUser'); 
})->name('register.form');

// Route untuk Dashboard User
Route::get('/DashboardUser', function () {
    return view('DashboardUser'); 
})->name('dasboarduser');

// Route untuk tampilan awal untuk user
Route::get('/UserPage/tentangKami', function () {
    return view('UserPage.tentangKami');
})->name('tentangkami');

// Route untuk Profil User
Route::get('/UserPage/ProfileUser', function () {
    return view('UserPage.ProfileUser');
})->name('ProfilUser');

// Route untuk memilih layanan user
Route::get('/UserPage/layanan', function () {
    return view('UserPage.layanan');
})->name('layanan');

// Route untuk memilih layanan Exspress
Route::get('/UserPage/layananEx', function () {
    return view('UserPage.layananEx');
})->name('layananex');

// Route untuk memilih layanan Reguler
Route::get('/UserPage/layananRe', function () {
    return view('UserPage.layananRe');
})->name('layananre');


// Route::get('/UserPage/tampilRiwayat', function () {
//     return view('UserPage.tampilRiwayat');
// })->name('tampilriwayat');

//Route untuk tampil riwayat transaksi user
 Route::get('/UserPage/tampilRiwayat', [LayananController::class, 'tampilRiwayat'])->name('layanan.riwayat');
 Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

 //Route untuk tampilan profile user
 Route::get('/UserPage/indexProfileUser', [UserController::class, 'profile']);

 // Route untuk memilih indexAdmin
Route::get('AdminPage/indexAdmin', function () {
    return view('AdminPage.indexAdmin');
})->name('indexadmin');
Route::get('/AdminPage/indexAdmin', [LayananController::class, 'indexForAdmin'])->name('admin.index');
Route::get('/AdminPage/indexAdmin', [LayananController::class, 'indexDashboard'])->name('admin.index');



 // Route untuk memilih indexProfileAdmin
Route::get('AdminPage/indexProfileAdmin', function () {
    return view('AdminPage.indexProfileAdmin');
})->name('indexprofileadmin');

//Route untuk memilih karyawan
Route::get('AdminPage/karyawan', function () {
    return view('AdminPage.karyawan');
})->name('karyawan');

//Route untuk memilih indexTotal
Route::get('/AdminPage/indexTotal', [LayananController::class, 'indexTotal'])->name('layanan.indexTotal');

// Route::get('/AdminPage/indexTotal', [LayananController::class, 'indexTotal'])->name('layanan.indexTotal');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
// Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.showLoginForm');

// Route::get('/AdminPage/karyawan', [KaryawanController::class, 'viewKaryawan'])->name('karyawan.view');
Route::get('/AdminPage/karyawan', [KaryawanController::class, 'viewKaryawan'])->name('karyawan.view');
// Route::post('/karyawan/create', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::post('/karyawan/store', [KaryawanController::class, 'create'])->name('karyawan.store');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/UserPage/indexProfileUser', [UserController::class, 'indexProfileUser'])->name('profile.index');
// }); 

// Route::get('/UserPage/indexProfileUser', [UserController::class, 'indexProfileUser'])->name('indexProfileUser');
Route::get('/profile', [UserController::class, 'ProfileUser'])->name('profile.user');

// Route::get('/UserPage/indexProfileUser', [UserController::class, 'indexProfileUser'])
//     ->name('indexProfileUser')
//     ->middleware('auth');





// Route::post('/layanan/{id}/update-status', [LayananController::class, 'updateStatus'])->name('layanan.updateStatus');
// Route::get('/admin/indexTotal', [LayananController::class, 'indexTotal'])->name('admin.indexTotal');












