<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth', 'isadmin']], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
