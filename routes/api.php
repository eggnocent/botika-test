<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\DivisiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.jwt')->group(function () {
    // Routes untuk Karyawan
    Route::resource('karyawans', KaryawanController::class)->except(['create', 'edit']);
    Route::get('karyawan-stats', [KaryawanController::class, 'stats']);

    // Routes untuk Pekerjaan
    Route::resource('pekerjaans', PekerjaanController::class)->except(['create', 'edit']);

    // Routes untuk Divisi
    Route::resource('divisis', DivisiController::class)->except(['create', 'edit']);
});

