<?php

// require __DIR__ . '/api.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlindboxController;
use App\Http\Controllers\TeddyController;
use App\Http\Controllers\CategoryController;

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
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Routing\Router;

Route::get('/collection-dashboard', [CollectionController::class, 'index'])->name('collection-dashboard');
Route::get('/collection/{id}', [CollectionController::class, 'show'])->name('collection.show');

Route::get('/test-api', function () {
    return view('test');
});


//Admin
Route::get('/danhmuc', [CategoryController::class, 'viewDanhMuc']);

Route::get('/danhmuc/create', [CategoryController::class, 'viewThemDanhMuc'])->name('danhmuc.create');

Route::get('/danhmuc/edit', function () {
    return view('admin.update_danhmuc');
});




Route::get('/products', [ProductController::class, 'viewProduct']);
Route::get('/products/create', [ProductController::class, 'viewThemProduct'])->name('products.create');
Route::get('product/edit/', [ProductController::class, 'viewEditProduct']);
Route::get('/image/create', [ImageController::class,'viewThemImage']);
route::get('image', [ImageController::class,'viewHinhAnh']);
Route::get('image/edit', [ImageController::class,'viewEditImage']);

