<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AdminSPController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Routes sản phẩm
Route::get('sp', [SanPhamController::class, 'index']);
Route::get('sp/{id}', [SanPhamController::class, 'chi_tiet']);
Route::get('loai/{id}', [SanPhamController::class, 'sp_trong_loai']);

// Routes quản trị sản phẩm
Route::apiResource('admin/sp', AdminSPController::class);

// Routes xác thực người dùng
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔹 Nhóm route yêu cầu xác thực
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'userProfile']);

    // Thêm route lấy thông tin user theo ID
    Route::get('/user/{id}', [UserController::class, 'show']);
});
Route::get('/users', [AuthController::class, 'listUsers']);
use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}', [CategoryController::class, 'show']);
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

use App\Http\Controllers\CartController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart']);
});
Route::middleware('auth:sanctum')->get('/cart', [CartController::class, 'viewCart']);

