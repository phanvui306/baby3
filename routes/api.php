<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
Route::post('/danh-muc', [CategoryController::class, 'store']);
