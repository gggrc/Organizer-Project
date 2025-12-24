<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

// Rute Halaman Depan
Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard Utama (Hanya untuk user yang terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Rute yang memerlukan Autentikasi
Route::middleware('auth')->group(function () {
    
    // --- Manajemen Profil (Bawaan) ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Manajemen Papan Kanban (Trello) ---
    // Menampilkan halaman utama papan kerja
    Route::get('/kanban', function () {
        return view('kanban');
    })->name('kanban');

    // API untuk mengambil data board, list, dan kartu
    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    
    // API untuk menyimpan perpindahan kartu (Real-time trigger)
    Route::patch('/cards/{card}/move', [CardController::class, 'move'])->name('cards.move');
    
    // API untuk menambah list atau kartu baru
    Route::post('/lists', [BoardController::class, 'storeList'])->name('lists.store');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
});

// Memuat rute autentikasi (login, register, dll)
require __DIR__.'/auth.php';