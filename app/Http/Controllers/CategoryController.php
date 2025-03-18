<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'tendanhmuc' => 'required|string|max:50',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $danhmuc = Category::create([
            'tendanhmuc' => $request->tendanhmuc,
        ]);
        return response()->json(['message' => 'Danh mục đã thêm thành công', 'data'=> $danhmuc], 201);
    }
}
