<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\sanpham;
class SanPhamController extends Controller
{

    public function create(){
        $categories = Category::all();
        return view('sanpham', compact('categories'));
    }
    public function store(Request $request){
        //kiểm tra  dữ liệu đầu vào

        $request->validate([
            'tensanpham' => 'required|string|max:50',
            'mota' => 'required|string',
            'sphot' => 'required|boolean',
            'iddanhmuc' => 'required|exists:danh_muc,id'
        ]);
        
        $sanpham = SanPham::create([
            'tensanpham' => $request->tensanpham,
            'mota' => $request->mota,
            'sphot' => $request->sphot ?? 0,
            'iddanhmuc' => $request->iddanhmuc
        ]);
         
        return response()->json([
            'message' => 'them san pham thanh cong',
            'sanpham' => $sanpham
        ], 201);
    }

}
