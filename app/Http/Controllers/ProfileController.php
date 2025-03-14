<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show()
    {
        $profile = Auth::user()->profile;

        // Kiểm tra nếu chưa có profile thì tạo mới
        if (!$profile) {
            return redirect()->route('profile.edit')->with('warning', 'Bạn cần cập nhật hồ sơ trước khi tiếp tục.');
        }

        // Kiểm tra nếu thiếu thông tin quan trọng
        if (empty($profile->full_name) || empty($profile->phone) || empty($profile->address)) {
            return redirect()->route('profile.edit')->with('warning', 'Vui lòng cập nhật đầy đủ thông tin hồ sơ.');
        }

        return view('profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }



    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',

        ]);

        $user = Auth::user();
        $profile = $user->profile ?: new Profile(['user_id' => $user->id]);

        $profile->fill($request->only(['full_name', 'phone', 'address']));

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
