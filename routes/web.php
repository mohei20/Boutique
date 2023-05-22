<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('show-category');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');


Route::group(['middleware' => ['auth']], function () {
    Route::get('purchase', [CartController::class, 'purchase'])->name('purchase');
    Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');
});
Auth::routes();
