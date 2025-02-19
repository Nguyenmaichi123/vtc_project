<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gioithieu', function () {
    return view('intro.index');
});

Route::get('/tin-tuc', [NewsController::class, 'index'])->name('tin-tuc');
Route::get('/tin-tuc/{slug}', [NewsController::class, 'show'])->name('news.show1');

Route::get('/lien-he', function () {
    return view('contact.index');
});

// Tìm kiếm
Route::get('/search', function (Request $request) {
    $query = $request->get('q');
    $results = \App\Models\News::where('title', 'like', "%{$query}%")
        ->orWhere('content', 'like', "%{$query}%")
        ->get();
    return view('search-results', compact('results', 'query'));
})->name('search');

// Route mail contact
Route::post('/contact2', [ContactController::class, 'store'])->name('contact.store');

// Dashboard (chỉ cho user đã xác minh email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (chỉ user đã đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Xác thực Laravel
Auth::routes();

// Phân quyền Admin / Customer
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/customer', function () {
        if (Auth::user()->role != 'customer') {
            abort(403);
        }
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

// Điều hướng `/home` về trang chủ
Route::get('/home', function () {
    return redirect('/');
})->name('home');
