<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanController;
use App\http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return redirect()->route('login'); // Mengarahkan ke halaman login
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
Route::post('/permohonan', [PermohonanController::class, 'store'])->middleware(['auth', 'role:pemohon'])->name('permohonan.store');
Route::get('/permohonan/{permohonan}', [PermohonanController::class, 'show'])->middleware(['auth', 'role_or_permission:lihat-permohonan|pemohon'])->name('permohonan.show');

// Route untuk admin (bisa melakukan semua aksi)
Route::get('/permohonan/{id}/edit', [PermohonanController::class, 'edit'])->middleware(['auth', 'role:admin' ])->name('permohonan.edit');

// Route untuk admin (hanya admin yang dapat menghapus permohonan)
Route::delete('/permohonan/{id}', [PermohonanController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('permohonan.destroy');


// Route::resource('permohonan', PermohonanController::class)->middleware(['auth', 'role:admin']);
Route::resource('user', UserController::class)->middleware(['auth', 'permission:tambah-user', 'permission:edit-user', 'permission:hapus-user', 'permission:lihat-user']); // Menambahkan middleware role:admin

// Tambahan route untuk upload dan updateStatus
Route::get('/permohonan/{id}/upload', [PermohonanController::class, 'uploadForm'])->middleware(['auth', 'role:admin|super-admin'])->name('permohonan.uploadForm');
Route::post('/permohonan/{id}/upload', [PermohonanController::class, 'upload'])->middleware(['auth', 'role:admin|super-admin'])->name('permohonan.upload');
Route::get('/permohonan/update-status/{id}/{status}', [PermohonanController::class, 'updateStatus'])->middleware(['auth', 'role:super-admin', 'role:admin'])->name('permohonan.updateStatus');
Route::get('/permohonan/download/{userId}', [PermohonanController::class, 'download'])->name('permohonan.download');

// Route::get('user/{id}/permissions', [UserController::class, 'permissions'])->name('user.permissions');
// Route::post('user/{id}/permissions', [UserController::class, 'updatePermissions'])->name('user.updatePermissions');

//route untuk pengelolaan roles
Route::middleware(['auth', 'permission:tambah-role', 'permission:edit-role', 'permission:hapus-role'])->group(function () {
    Route::resource('role', RoleController::class);
});

// 'permission:tambah-role', 'permission:edit-role', 'permission:hapus-role'

//route untuk pengelolaan permissions
Route::middleware(['auth', 'permission:tambah-permission', 'permission:edit-permission', 'permission:hapus-permission'])->group(function () {
Route::resource('permission', PermissionController::class);
});

// Route::get('admin',function(){
//     return '<h1> Hello admin </h1>';
// })->middleware(['auth', 'verified', 'role:admin']);

// Route::get('pemohon',function(){
//     return '<h1> Hello pemohon </h1>';
// })->middleware(['auth', 'verified', 'role:pemohon|admin']);

require __DIR__.'/auth.php';


