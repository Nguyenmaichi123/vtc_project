<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[
    HomeController::class,'home'
]);

Route::get('/gioithieu', function () {
    return view('intro.index');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/on-sale-product', [ProductController::class, 'onSale'])->name('product.onSale');
Route::get('/best-selling-product/{category?}', [ProductController::class, 'bestSelling'])->name('product.bestSelling');
Route::get('/new-product', [ProductController::class, 'new'])->name('product.new');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');