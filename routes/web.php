<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home'])->name('home.index');

Route::get('/gioithieu', function () {
    return view('intro.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('products.onSale');
Route::get('/best-selling-product', [ProductController::class, 'bestSelling'])->name('products.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('products.new');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/brand/{brand}', [ProductController::class, 'filterByBrand'])->name('products.filterByBrand');
Route::get('/products/type/{type}', [ProductController::class, 'filterByType'])->name('products.filterByType');

Route::get('/product-detail/{id}', [ProductController::class, 'showDetail'])->name('products.detail');