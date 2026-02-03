<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Struktur Autentikasi Berbasis Role
|--------------------------------------------------------------------------
|
| Sistem menggunakan satu halaman login unified dengan role selector.
| 
| Alur Login:
| 1. User mengakses /login
| 2. User memilih role: Mahasiswa, Dosen, atau Admin
| 3. Form input menyesuaikan:
|    - Mahasiswa: NIM + password
|    - Dosen: NIP + password  
|    - Admin: id_user/username + password
| 4. Setelah login berhasil, redirect ke dashboard sesuai role
|
| Struktur Data User:
| - id_user: bisa berupa NIM, NIP, atau username tergantung role
| - password: hash password
| - role: mahasiswa | dosen | admin
|
*/

// =============================================================================
// ROUTE PUBLIC (Tanpa Autentikasi)
// =============================================================================

// Landing Page Repositori
Route::get('/', function () {
    $judulTAs = \App\Models\JudulTA::orderBy('created_at', 'desc')->take(10)->get();
    $totalJudul = \App\Models\JudulTA::count();
    
    // Stats per peminatan
    $peminatanStats = \App\Models\JudulTA::selectRaw('peminatan, count(*) as total')
        ->groupBy('peminatan')
        ->get()
        ->pluck('total', 'peminatan')
        ->toArray();
    
    // Stats per arah profesi
    $profesiStats = \App\Models\JudulTA::selectRaw('arah_profesi, count(*) as total')
        ->whereNotNull('arah_profesi')
        ->groupBy('arah_profesi')
        ->get()
        ->pluck('total', 'arah_profesi')
        ->toArray();
    
    // Get dosen list
    $dosenList = \App\Models\User::where('role', 'dosen')
        ->withCount(['bimbinganPembimbing1', 'bimbinganPembimbing2'])
        ->get()
        ->map(function ($dosen) {
            $dosen->bimbingan_count = $dosen->bimbingan_pembimbing1_count + $dosen->bimbingan_pembimbing2_count;
            return $dosen;
        });
    
    return view('landing', compact('judulTAs', 'totalJudul', 'peminatanStats', 'profesiStats', 'dosenList'));
})->name('home');


// =============================================================================
// ROUTE AUTENTIKASI
// =============================================================================

// Login Page (Unified - Satu halaman untuk semua role)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Process Login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =============================================================================
// ROUTE MAHASISWA (Role: mahasiswa)
// =============================================================================

Route::prefix('mahasiswa')->name('mahasiswa.')->middleware(['auth'])->group(function () {
    // Dashboard Mahasiswa
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    
    // Pengajuan Judul
    Route::get('/pengajuan-judul', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::post('/pengajuan-judul', [PengajuanController::class, 'store'])->name('pengajuan.store');
    
    // Konsultasi
    Route::post('/konsultasi/send', [PengajuanController::class, 'sendChat'])->name('konsultasi.send');
    Route::post('/konsultasi/mark-read', [PengajuanController::class, 'markChatAsRead'])->name('konsultasi.markRead');
    
    // Dokumentasi
    Route::post('/dokumentasi/store', [PengajuanController::class, 'storeDokumentasi'])->name('dokumentasi.store');
    
    // Progres Bimbingan
    Route::post('/progres-bimbingan/store', [PengajuanController::class, 'storeProgresBimbingan'])->name('progres.store');
    Route::get('/progres-bimbingan', [PengajuanController::class, 'getProgresBimbingan'])->name('progres.index');
});

// Route untuk Pengajuan Judul (backward compatibility - tanpa auth untuk development)
Route::get('/pengajuan-judul', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::post('/pengajuan-judul', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::post('/konsultasi/send', [PengajuanController::class, 'sendChat'])->name('pengajuan.sendChat');
Route::post('/konsultasi/mark-read', [PengajuanController::class, 'markChatAsRead'])->name('pengajuan.markChatAsRead');
Route::post('/dokumentasi/store', [PengajuanController::class, 'storeDokumentasi'])->name('pengajuan.storeDokumentasi');
Route::get('/api/filter-judul', [PengajuanController::class, 'filter'])->name('pengajuan.filter');
Route::post('/progres-bimbingan/store', [PengajuanController::class, 'storeProgresBimbingan'])->name('pengajuan.storeProgresBimbingan');
Route::get('/progres-bimbingan', [PengajuanController::class, 'getProgresBimbingan'])->name('pengajuan.getProgresBimbingan');
Route::post('/progres-bimbingan/{id}/feedback', [PengajuanController::class, 'submitFeedback'])->name('pengajuan.submitFeedback');


// =============================================================================
// ROUTE DOSEN (Role: dosen)
// =============================================================================

Route::prefix('dosen')->name('dosen.')->middleware(['auth'])->group(function () {
    // Dashboard Dosen
    Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dashboard');
    
    // Detail Mahasiswa Bimbingan
    Route::get('/mahasiswa/{id}', [DosenController::class, 'detailMahasiswa'])->name('mahasiswa.detail');
    
    // Update Progress Mahasiswa
    Route::post('/mahasiswa/{id}/progress', [DosenController::class, 'updateProgress'])->name('mahasiswa.progress');
    
    // Feedback Progres Bimbingan
    Route::post('/progres/{id}/feedback', [DosenController::class, 'submitFeedback'])->name('progres.feedback');
});


// =============================================================================
// ROUTE ADMIN (Role: admin)
// =============================================================================

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Manajemen User
    Route::get('/users', [AdminController::class, 'indexUsers'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
    
    // Manajemen Judul TA
    Route::get('/judul-ta', [AdminController::class, 'indexJudulTA'])->name('judul.index');
    Route::post('/judul-ta/{id}/approve', [AdminController::class, 'approveJudul'])->name('judul.approve');
    Route::post('/judul-ta/{id}/reject', [AdminController::class, 'rejectJudul'])->name('judul.reject');
    
    // Laporan & Statistik
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
});