<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChatController;

use App\Models\Category;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function () {
    return response()->json([
        'message' => 'API hoạt động thành công!',
        'status' => 200
    ], 200);
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class,'destroy']);

// hình ảnh
Route::get('/image', [ImageController::class,'index']);
Route::post('/image', [ImageController::class,'themHinhAnh']);
Route::put('/image/{id}', [ImageController::class, 'suaHinhAnh']);

Route::prefix('admin')->group(function (): void {
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
});


//đơn hàng
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']); // Lấy chi tiết đơn hàng
Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus']);


Route::post('/chat', [ChatController::class, 'chat']);
