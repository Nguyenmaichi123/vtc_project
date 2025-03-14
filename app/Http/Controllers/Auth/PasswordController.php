<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     * 
     * 
     */


    public function edit()
    {
        return view('profile.password');
    }
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }



    public function handlePasswordInput(Request $request)
    {
        // Lấy dữ liệu từ form
        $request->validate([
            'current_password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6', 'different:current_password'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        // Lấy user hiện tại
        $user = Auth::user();

        if (!$user) {
            return back()->withErrors(['error' => 'Không tìm thấy người dùng, vui lòng đăng nhập lại!']);
        }

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        // Gán mật khẩu mới đã mã hóa


        // Kiểm tra nếu mật khẩu cũ và mới trùng nhau
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'Mật khẩu mới không được giống mật khẩu cũ!']);
        }

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('password.edit')->with('success', 'Đổi mật khẩu thành công!');
    }
}
