<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanController;
use App\http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login
});

Route::fallback(function () {
    return view('errors.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'role:admin|super-admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk menampilkan halaman survey
Route::get('/permohonan/survey/{permohonan}', [SurveyController::class, 'index'])->name('survey.index')->middleware('auth');

// Rute untuk menyimpan hasil survey
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

// Route untuk pemohon
Route::get('/permohonan', [PermohonanController::class, 'index'])->middleware(['auth', 'permission:lihat-permohonan'])->name('permohonan.index');
Route::get('/permohonan/create', [PermohonanController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:tambah-permohonan|pemohon'])->name('permohonan.create');
Route::post('/permohonan', [PermohonanController::class, 'store'])->middleware(['auth', 'role_or_permission:tambah-permohonan|pemohon'])->name('permohonan.store');
Route::get('/permohonan/{permohonan}', [PermohonanController::class, 'show'])->middleware(['auth', 'role_or_permission:lihat-permohonan|pemohon'])->name('permohonan.show');

Route::middleware('auth')->group(function () {
    // Rute untuk halaman edit
    Route::get('permohonan/{permohonan}/edit', [PermohonanController::class, 'edit'])->middleware('auth', 'role:admin|super-admin|pengelola-permohonan')->name('permohonan.edit');

    // Rute untuk update permohonan
    Route::put('permohonan/{permohonan}', [PermohonanController::class, 'update'])->middleware('auth', 'role:admin|super-admin|pengelola-permohonan')->name('permohonan.update');

    // Rute untuk menghapus permohonan
    Route::delete('permohonan/{permohonan}', [PermohonanController::class, 'destroy'])->middleware('auth', 'role:admin|super-admin|pengelola-permohonan')->name('permohonan.destroy');
});

Route::get('/user/create_admin', [UserController::class, 'create_admin'])->middleware('auth', 'role:super-admin')->name('user.create_admin');
Route::post('/user/create_admin', [UserController::class, 'storeAdmin'])->name('user.store_admin'); // Untuk menyimpan data (POST)


// Route::resource('permohonan', PermohonanController::class)->middleware(['auth', 'role:admin']);
Route::resource('user', UserController::class)->middleware(['auth', 'permission:tambah-user', 'permission:edit-user', 'permission:hapus-user', 'permission:lihat-user']); // Menambahkan middleware role:admin

// Tambahan route untuk upload dan updateStatus
Route::get('/permohonan/{id}/upload', [PermohonanController::class, 'uploadForm'])->middleware(['auth', 'role:admin|super-admin'])->name('permohonan.uploadForm');
Route::post('/permohonan/{id}/upload', [PermohonanController::class, 'upload'])->middleware(['auth', 'role:admin|super-admin'])->name('permohonan.upload');
Route::get('/permohonan/update-status/{id}/{status}', [PermohonanController::class, 'updateStatus'])->Middleware('auth', 'role:admin|super-admin|pengelola-permohonan')->name('permohonan.updateStatus');
Route::get('/permohonan/download/{userId}', [PermohonanController::class, 'download'])->name('permohonan.download');

Route::get('user/{id}/permissions', [UserController::class, 'permissions'])->name('user.permissions');
Route::post('user/{id}/permissions', [UserController::class, 'updatePermissions'])->name('user.updatePermissions');

//route untuk pengelolaan roles
Route::middleware(['auth', 'permission:tambah-role', 'permission:edit-role', 'permission:hapus-role'])->group(function () {
    Route::resource('role', RoleController::class);
});

// 'permission:tambah-role', 'permission:edit-role', 'permission:hapus-role'

//route untuk pengelolaan permissions
Route::middleware(['auth', 'permission:tambah-permission', 'permission:edit-permission', 'permission:hapus-permission'])->group(function () {
Route::resource('permission', PermissionController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'admin'])->name('user.admin');
});

// Route::get('admin',function(){
//     return '<h1> Hello admin </h1>';
// })->middleware(['auth', 'verified', 'role:admin']);

// Route::get('pemohon',function(){
//     return '<h1> Hello pemohon </h1>';
// })->middleware(['auth', 'verified', 'role:pemohon|admin']);

require __DIR__.'/auth.php';


