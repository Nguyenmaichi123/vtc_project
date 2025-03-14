<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index()
{
// Tổng doanh thu
$totalRevenue = Order::where('status', 'completed')->sum('total_price');

// Tổng số đơn hàng
$totalOrders = Order::count();

// Tổng số sản phẩm
$totalProducts = Product::count();

// Tổng số khách hàng (không tính admin)
$totalCustomers = User::where('role', 'customer')->count();

// Thống kê trạng thái đơn hàng
$pendingOrders = Order::where('status', 'pending')->count();
$shippingOrders = Order::where('status', 'shipping')->count();
$completedOrders = Order::where('status', 'completed')->count();
$canceledOrders = Order::where('status', 'canceled')->count();

// Lấy dữ liệu doanh thu 6 tháng gần nhất
$months = [];
$monthlyRevenue = [];
for ($i = 5; $i >= 0; $i--) {
$date = Carbon::now()->subMonths($i);
$months[] = $date->format('m/Y');
$monthlyRevenue[] = Order::where('status', 'completed')
->whereYear('created_at', $date->year)
->whereMonth('created_at', $date->month)
->sum('total_price');
}

return view('admin.dashboard', compact(
'totalRevenue', 'totalOrders', 'totalProducts', 'totalCustomers',
'pendingOrders', 'shippingOrders', 'completedOrders', 'canceledOrders',
'months', 'monthlyRevenue'
));
}
    
}