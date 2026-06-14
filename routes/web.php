<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiPegawaiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    if(Auth::user()) {
        return redirect('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute untuk admin dengan prefix 'admin'
Route::prefix('admin')->middleware(['auth', 'permission:access-admin'])->group(function () {
    Route::view('about', 'about')->name('admin.about');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    
    // Group Setup (User, Role, Permission)
    Route::prefix('setup')->group(function () {
        // Group untuk manajemen user/pegawai
        Route::group(['middleware' => ['permission:manage-users']], function () {
            Route::resource('users', UserController::class);
            Route::get('users/reset-password/{id}', [UserController::class, 'resetPass'])->name('admin.users.reset');
        });

        // Group untuk manajemen roles & permissions
        Route::group(['middleware' => ['permission:manage-settings']], function () {
            Route::resource('roles', RoleController::class);
            Route::post('roles/assign-permission', [RoleController::class, 'assignPermission'])->name('admin.roles.assignPermission');
            
            Route::resource('permissions', PermissionController::class);
        });
    });

    // Group untuk manajemen presensi admin
    Route::group(['middleware' => ['permission:manage-presensi']], function () {
        Route::resource('presensis', PresensiController::class);
    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Rute untuk pegawai dengan prefix 'pegawai'
Route::prefix('pegawai')->middleware(['auth', 'permission:access-pegawai'])->group(function () {
    Route::view('about', 'about')->name('pegawai.about');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('pegawai.home');
    
    Route::group(['middleware' => ['permission:do-presensi']], function () {
        Route::resource('presensis', PresensiPegawaiController::class);
    });

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    Route::group(['middleware' => ['permission:manage-logbook']], function () {
        Route::resource('logbook', LogbookController::class);
    });
});
