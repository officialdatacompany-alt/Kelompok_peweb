<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Menyediakan semua endpoint API untuk produk sekaligus
Route::apiResource('products', ProductController::class);