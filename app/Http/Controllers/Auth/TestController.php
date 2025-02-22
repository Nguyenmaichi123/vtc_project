<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function dashboard()
{
    $userId = Auth::id(); // Lấy user ID trực tiếp từ Auth

    return view('home.index', compact('userId'));
}
}
