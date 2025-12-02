<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentRegistrationController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// About/Tentang
Route::get('/tentang', [AboutController::class, 'index'])->name('about.index');

// News/Berita
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

// Programs
Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Donation
Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
Route::post('/donasi', [DonationController::class, 'store'])->name('donation.store');
Route::post('/donasi/regular', [DonationController::class, 'storeRegularDonor'])->name('donation.regular');

// Gallery
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Student Registration
Route::get('/daftar-santri', [StudentRegistrationController::class, 'create'])->name('registration.create');
Route::post('/daftar-santri', [StudentRegistrationController::class, 'store'])->name('registration.store');
