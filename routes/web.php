<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| File ini berisi semua route (jalur URL) untuk aplikasi web kamu.
| Route menentukan URL apa yang bisa diakses dan method apa yang dijalankan.
|--------------------------------------------------------------------------
*/

// 🔹 Route dasar (tes koneksi Laravel)
Route::get('/hello', function () {
    return 'Hello Laravel!';
});

// 🔹 Route ke MahasiswaController (versi manual)
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

// ✅ FIX UPDATE: gunakan PUT (bukan POST)
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// ✅ FIX DELETE: gunakan DELETE
Route::delete('/mahasiswa/{id}/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// 🔹 Route beranda → redirect ke daftar mahasiswa
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});
