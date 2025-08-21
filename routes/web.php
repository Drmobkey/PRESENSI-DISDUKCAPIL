<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiPegawaiController;

Route::get('/', function () {
    if(Auth::user()) {
        return redirect('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute untuk admin dengan prefix 'admin'
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::view('about', 'about')->name('admin.about');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    Route::resource('users', UserController::class);
    Route::get('users/reset-password/{id}', [UserController::class, 'resetPass'])->name('admin.users.reset');
    Route::resource('presensis', PresensiController::class);
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Rute untuk pegawai dengan prefix 'pegawai'
Route::prefix('pegawai')->middleware(['auth'])->group(function () {
    Route::view('about', 'about')->name('pegawai.about');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('pegawai.home');
    Route::resource('presensis', PresensiPegawaiController::class);
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('logbook', LogbookController::class);
});
