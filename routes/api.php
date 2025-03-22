<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/testsssssssss', function (Request $request) {
    return response()->json(['message' => 'API hoat dong binh thuongggggg!']);
});

Route::get('/danhmuc', [CategoryController::class, 'index'])->name('danhmuc.index');

Route::get('/danhmuc/them', [CategoryController::class, 'them'])->name('danhmuc.them');
Route::post('/danhmuc', [CategoryController::class, 'store'])->name('danhmuc.store');

Route::get('/danhmuc/sua/{id}', [CategoryController::class, 'edit'])->name('danhmuc.sua');
Route::put('/danhmuc/{id}', [CategoryController::class, 'update'])->name('danhmuc.update');

Route::delete('/danhmuc/{id}', [CategoryController::class, 'destroy']);