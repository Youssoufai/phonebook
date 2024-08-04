<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', ContactController::class);
Route::view('/', 'components.phonebook')->name('home');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [ContactController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::get('/form', [DashboardController::class, 'index'])->name('form');
    // Email verification
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    // Email Verification Handler Route
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');
    // Resending the Verification Email route

    Route::post('/email/verification-notification', [AuthController::class, 'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
