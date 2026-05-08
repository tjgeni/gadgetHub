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
        $totalProduk = Product::count();
        $totalKategori = Category::count();
        $totalUser = User::where('role', 'user')->count();
        $totalPesanan = Order::count();
        $pesananPending = Order::where('status', 'pending')->count();
        $pesananSelesai = Order::where('status', 'selesai')->count();
        $pesananTerbaru = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProduk', 'totalKategori', 'totalUser',
            'totalPesanan', 'pesananPending', 'pesananSelesai',
            'pesananTerbaru'
        ));
    }
}
