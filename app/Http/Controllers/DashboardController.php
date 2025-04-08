<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy tổng số người dùng
        $totalUsers = KhachHang::count();

        // Lấy tổng số đơn hàng
        $totalOrders = Order::count();

        // Lấy tổng số sản phẩm
        $totalProducts = Product::count();

        // Truyền dữ liệu sang View
        return view('admin.home', compact('totalUsers', 'totalOrders', 'totalProducts'));
    }
}
