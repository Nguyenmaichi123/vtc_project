<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Models\Order;


class AdminController extends Controller
{

    public function dashboard()
    {
        // Load dữ liệu mới nhất từ database
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthlyRevenue = Order::selectRaw('SUM(total_price) as revenue, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue');

        // Load số lượng đơn hàng theo trạng thái
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $confirmedOrders = Order::where('status', 'confirmed')->count();
        $shippingOrders = Order::where('status', 'shipping')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $canceledOrders = Order::where('status', 'canceled')->count();

        return view('admin.dashboard', compact(
            'months',
            'monthlyRevenue',
            'pendingOrders',
            'processingOrders',
            'confirmedOrders',
            'shippingOrders',
            'completedOrders',
            'canceledOrders'
        ));
    }
}
