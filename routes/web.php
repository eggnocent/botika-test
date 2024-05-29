<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\PekerjaanController;
use app\Http\Controllers\DivisiController;
use app\Http\Controllers\KaryawanController;

use Inertia\Inertia;

Route::get('/', function () {
    return view('app');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('karyawans', KaryawanController::class);
    Route::resource('pekerjaans', PekerjaanController::class);
    Route::resource('divisis', DivisiController::class);
});

Route::fallback(function () {
    return Inertia::render('NotFound');
});
