<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AnggotaController;

Route::resource('buku', BukuController::class);
Route::patch('/peminjaman/{peminjaman}/kembali', [PeminjamanController::class, 'kembali'])
    ->name('peminjaman.kembali');
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('anggota', AnggotaController::class);
Route::get('/', function () {
    return view('welcome');
});
