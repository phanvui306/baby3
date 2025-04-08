<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;

class OrderController extends Controller
{
    // Lấy danh sách đơn hàng
    public function index()
    {
        return response()->json(DonHang::all());
    }

    // Lấy thông tin chi tiết đơn hàng
    public function show($id)
    {
        $order = DonHang::with('chiTiet')->find($id);
        return response()->json($order);
    }

    // Cập nhật trạng thái đơn hàng
    public function update(Request $request, $id)
    {
        $order = DonHang::findOrFail($id);
        $order->trangthai = $request->trangthai;
        $order->save();
        return response()->json(['message' => 'Cập nhật thành công']);
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        DonHang::destroy($id);
        return response()->json(['message' => 'Đơn hàng đã bị xóa']);
    }
}

