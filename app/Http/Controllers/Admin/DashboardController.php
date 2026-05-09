<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_product = Product::count();
        $total_categories = Category::count();

        $total_users = User::where('role', 'user')->count();

        $total_order = Order::count();
        $total_pending_orders = Order::where('status', 'pending')->count();
        $total_done_orders = Order::where('status', 'selesai')->count();

        $latest_total_orders = Order::with('user')
            ->select('id', 'user_id', 'total_price', 'address', 'phone', 'status')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'total_product',
            'total_categories',
            'total_users',
            'total_order',
            'total_pending_orders',
            'total_done_orders',
            'latest_total_orders'
        ));
    }
}
