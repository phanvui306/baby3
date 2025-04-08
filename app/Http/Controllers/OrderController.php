<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        $donhang = Order::all()->map(function ($order) {

            switch ($order->trangthai) {
                case 1:
                    $order->trangthai_label = 'Đã giao hàng';
                    break;
                case 0:
                    $order->trangthai_label = 'Đang xử lý';
                    break;
                case 2:
                    $order->trangthai_label = 'Đang vận chuyển';
                    break;
                case 3:
                    $order->trangthai_label = 'Đã huỷ';
                    break;
                case 4:
                    $order->trangthai_label = 'Đang chờ thanh toán';
                    break;
                default:
                    $order->trangthai_label = 'Chưa xác định';
                    break;
            }
            return $order;
        });

        return response()->json([
            'message' => 'Lấy thông tin đơn hàng thành công',
            'don_hang' => $donhang
        ], 200);
    }

    // Lấy chi tiết một đơn hàng
    public function show($id) {
        $donhang = Order::with('chitietdonhang.bienthe')->find($id);

        if (!$donhang) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }

        return response()->json([
            'order' => $donhang
        ], 200);
    }


    public function viewDonHang()
    {
        return view('admin.order');
    }

    public function updateStatus($id, Request $request)
    {

        $request->validate([
            'trangthai' => 'required|integer|min:0|max:4',
        ]);


        $order = Order::find($id);


        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }


        $order->trangthai = $request->trangthai;
        $order->save();

        return response()->json(['message' => 'Cập nhật trạng thái thành công', 'order' => $order], 200);
    }
}
