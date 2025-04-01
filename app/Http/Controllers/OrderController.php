<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index(){
        $donhang = Order::all();
        return response()->json([
            'massage' => 'Lấy thông tin đơn hàn thành công',
            'don_hang' => $donhang
        ], 200);
    }

    public function viewDonHang(){
        return view('admin.order');
    }
}
