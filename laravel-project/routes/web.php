<?php

use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - STT Pro PMB
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [PendaftarController::class, 'index'])->name('home');

// Form Pendaftaran
Route::post('/pendaftaran', [PendaftarController::class, 'store'])->name('pendaftaran.store');
