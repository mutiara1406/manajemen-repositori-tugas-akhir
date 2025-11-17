<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

// ROUTE ROOT: Halaman utama/home
Route::get('/', function () {
    return redirect('/pengajuan-judul');
});

// ROUTE PORTAL: 4 Tab - Kumpulan Judul, Pengajuan, Konsultasi, Dokumentasi
Route::get('/pengajuan-judul', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::post('/pengajuan-judul', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::post('/konsultasi/send', [PengajuanController::class, 'sendChat'])->name('pengajuan.sendChat');
Route::get('/api/filter-judul', [PengajuanController::class, 'filter'])->name('pengajuan.filter');