<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\DivisiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authenticated Routes
Route::middleware('auth.jwt')->group(function () {
    // Routes for Karyawan
    Route::resource('karyawans', KaryawanController::class)->except(['create', 'edit']);
    Route::get('karyawan-stats', [KaryawanController::class, 'stats']);

    // Routes for Pekerjaan
    Route::resource('pekerjaans', PekerjaanController::class)->except(['create', 'edit']);

    // Routes for Divisi
    Route::resource('divisis', DivisiController::class)->except(['create', 'edit']);
});

