<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Http\Resources\SanPhamResource;

class SanPhamController extends Controller {
    
    // Lấy danh sách sản phẩm
    public function index() {
        $listsp = SanPham::all();  
        $data = SanPhamResource::collection($listsp);      
        return response()->json($data, 200);
    }

    // Lấy chi tiết sản phẩm theo ID
    public function chi_tiet($id) {
        $sp = SanPham::find($id);
        if (!$sp) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại!'
            ], 404);
        }
        $data = new SanPhamResource($sp);
        return response()->json($data, 200);
    }

    // Lấy danh sách sản phẩm theo loại
    public function sp_trong_loai($id) {
        $listsp = SanPham::where('id_loai', $id)
            ->orderBy('id', 'desc')->get();
        
        if ($listsp->isEmpty()) {
            return response()->json([
                'message' => 'Không có sản phẩm nào trong loại này!'
            ], 404);
        }

        $data = SanPhamResource::collection($listsp);
        return response()->json($data, 200);
    }
}
