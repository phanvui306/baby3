<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SanPhamController;
Route::post('/danh-muc', [CategoryController::class, 'store']);
// Route::post('/san-pham', [SanPhamController::class, 'store']);