<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMutationController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;



// Redirect root to dashboard (if authenticated, it will show dashboard, else redirect to login)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Access the KeyGuard landing page
Route::get('/landing', function () {
    return view('landing');
});

// Authentication Routes (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated Routes (Requires Auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 1. Product Management Routes
    // Index and Show are accessible by Super Admin and Staff Gudang
    Route::middleware(['role:Super Admin|Staff Gudang'])->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    });
    // Write routes (create, store, edit, update, destroy) are restricted to Staff Gudang
    Route::middleware(['role:Staff Gudang'])->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // 2. Stock Mutation Routes
    // Index is viewable by Super Admin and Staff Gudang
    Route::middleware(['role:Super Admin|Staff Gudang'])->group(function () {
        Route::get('/mutations', [StockMutationController::class, 'index'])->name('mutations.index');
    });
    // Write routes (create, store) restricted to Staff Gudang
    Route::middleware(['role:Staff Gudang'])->group(function () {
        Route::get('/mutations/create', [StockMutationController::class, 'create'])->name('mutations.create');
        Route::post('/mutations', [StockMutationController::class, 'store'])->name('mutations.store');
    });

    // 3. Reports (Restricted to Super Admin / Owner)
    Route::middleware(['role:Super Admin'])->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');
    });
});

