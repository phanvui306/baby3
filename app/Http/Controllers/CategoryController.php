<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'ten_danh_muc' => 'required|string|max:255|unique:danh_muc,ten_danh_muc',
            'mo_ta' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        // Tạo danh mục mới
        $danhMuc = Category::create([
            'tendanhmuc' => $request->ten_danh_muc,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm danh mục thành công!',
            'data' => $danhMuc,
        ], 201);
    }
}
