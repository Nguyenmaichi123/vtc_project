<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index()
{
// **1. Tổng số đơn hàng**
$totalOrders = Order::count();

// **2. Tổng doanh thu**
$totalRevenue = Order::where('status', 'completed')->sum('total_price');

// **3. Tổng số sản phẩm**
$totalProducts = Product::count();

// **4. Tổng số khách hàng**
$totalCustomers = User::where('role', 'customer')->count();

// **5. Thống kê đơn hàng theo trạng thái**
$pendingOrders = Order::where('status', 'pending')->count();
$shippedOrders = Order::where('status', 'shipped')->count();
$completedOrders = Order::where('status', 'completed')->count();
$cancelledOrders = Order::where('status', 'cancelled')->count();

// **6. Doanh thu theo từng tháng (cho biểu đồ)**
$monthlyRevenue = Order::where('status', 'completed')
->selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
->groupBy('month')
->pluck('revenue', 'month');

return view('admin.dashboard', compact(
'totalOrders', 'totalRevenue', 'totalProducts', 'totalCustomers',
'pendingOrders', 'shippedOrders', 'completedOrders', 'cancelledOrders',
'monthlyRevenue'
));
}
}