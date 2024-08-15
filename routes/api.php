<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenggajianController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::post('/pegawai', [PegawaiController::class, 'store']);
Route::get('/pegawai/{pegawai_id}', [PegawaiController::class, 'show']);
Route::put('/pegawai/{pegawai_id}', [PegawaiController::class, 'update']);
Route::delete('/pegawai/{pegawai_id}', [PegawaiController::class, 'destroy']);

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::post('/absensi', [AbsensiController::class, 'store']);
Route::get('/absensi/{id}', [AbsensiController::class, 'show']);
Route::put('/absensi/{id}', [AbsensiController::class, 'update']);
Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy']);

Route::get('/penggajian', [PenggajianController::class, 'index']);
Route::post('/penggajian', [PenggajianController::class, 'store']);
Route::get('/penggajian/{id}', [PenggajianController::class, 'show']);
Route::put('/penggajian/{id}', [PenggajianController::class, 'update']);
Route::delete('/penggajian/{id}', [PenggajianController::class, 'destroy']);
Route::post('/hitung-gaji', [PenggajianController::class, 'hitungGaji']);