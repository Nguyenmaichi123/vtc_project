<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Điều hướng người dùng sau khi đăng nhập thành công
     */
    protected function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            return '/admin-dashboard'; // Điều hướng admin đến trang quản trị
        }
        return '/'; // Người dùng bình thường về trang chủ
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

