<?php

use App\Http\Controllers\Api\ProductController as ApiProductController;
use Illuminate\Support\Facades\Route;

// Menyediakan semua endpoint API untuk produk sekaligus
Route::apiResource('products', ApiProductController::class)->names('api.products');