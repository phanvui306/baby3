<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlindboxController;
use App\Http\Controllers\TeddyController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/blindbox', [BlindboxController::class, 'index'])->name('blindbox');
Route::get('/blindbox/{id}', [BlindboxController::class, 'show'])->name('blindbox.show');

Route::get('/teddy', [TeddyController::class, 'index'])->name('teddy');
Route::get('/teddy/{id}', [TeddyController::class, 'show'])->name('teddy.show');

use App\Http\Controllers\CollectionController;

Route::get('/collection-dashboard', [CollectionController::class, 'index'])->name('collection-dashboard');
Route::get('/collection/{id}', [CollectionController::class, 'show'])->name('collection.show');
