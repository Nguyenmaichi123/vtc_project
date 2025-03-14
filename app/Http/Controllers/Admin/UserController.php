<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', '!=', 'admin')
            ->whereNull('deleted_at')->orderBy('created_at', 'desc'); // ✅ Chỉ lấy user chưa bị vô hiệu hóa

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->paginate(8); // ✅ Phân trang

        return view('admin.users.index', compact('users'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.users.edit', compact('order'));
    }


    public function update(Request $request, $id)
    {
        // Tìm đơn hàng
        $order = Order::findOrFail($id);

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:pending,processing,confirmed,shipped,completed,canceled',
        ]);

        // Cập nhật thông tin đơn hàng
        $order->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        // Kiểm tra nếu đơn hàng thuộc một khách hàng cụ thể
        if ($order->user_id) {
            return redirect()->route('admin.customers.show', $order->user_id)
                ->with('success', 'Cập nhật đơn hàng thành công.');
        }

        // Nếu không có user_id, quay lại trang danh sách đơn hàng
        return redirect()->route('admin.orders.index')
            ->with('success', 'Cập nhật đơn hàng thành công.');
    }








    public function show(User $user)
    {
        $orders = Order::where('user_id', $user->id)->get();

        return view('admin.users.show', compact('user', 'orders'));
    }


    //danh sach vo hieu hoa
    public function indexDeleted(User $user)
    {
        $users = User::onlyTrashed()->where('role', '!=', 'admin')->paginate(8);
        return view('admin.users.deleted', compact('users'));
    }



    public function destroy($id)
    {
        // Tìm user theo ID
        $user = User::where('id', $id)->where('role', '!=', 'admin')->first();

        // Nếu không tìm thấy user hoặc là admin thì không cho xóa
        if (!$user) {
            return redirect()->route('admin.customers.index')->with('error', 'Không thể xóa tài khoản này.');
        }

        // Xóa mềm user (cập nhật `deleted_at`)
        $user->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Tài khoản đã bị vô hiệu hóa.');
    }
    public function restore($id)
    {
        // Tìm user bao gồm cả user bị xóa mềm
        $user = User::withTrashed()->where('id', $id)->first();

        // Kiểm tra nếu user tồn tại và đã bị xóa mềm
        if (!$user || !$user->trashed()) {
            return redirect()->route('admin.users.deleted')->with('error', 'Tài khoản không hợp lệ hoặc chưa bị vô hiệu hóa.');
        }

        // Khôi phục tài khoản
        $user->restore();

        return redirect()->route('admin.users.deleted')->with('success', 'Tài khoản đã được kích hoạt lại.');
    }
}
