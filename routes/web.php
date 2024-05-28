<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Rute untuk mengakses app.blade.php
Route::get('/', function () {
    return view('app');
});

// Rute lainnya yang membutuhkan otentikasi
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('karyawans', KaryawanController::class);
    Route::resource('pekerjaans', PekerjaanController::class);
    Route::resource('divisis', DivisiController::class);
});

// Rute fallback untuk menangani halaman tidak ditemukan
Route::fallback(function () {
    return Inertia::render('NotFound'); // Pastikan Anda memiliki komponen NotFound.vue
});
