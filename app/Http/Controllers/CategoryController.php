<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response; //
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    // lấy danh sách danh mục
    public function index()
    {
        $danhmuc = Category::all();
        return response()->json([
            'success' => true,
            'danhmucs' => $danhmuc
        ]);
    }

    public function viewDanhMuc()
    {
        return view('admin.dsdanhmuc');
    }
    //
    public function them()
    {
        return view('admin.danhmuc'); // Trả về view thêm danh mục
    }

    // Hiển thị trang thêm danh mục
    public function viewThemDanhMuc()
    {
        return view('admin.createDanhMuc');
    }
    // Thêm danh mục
    public function store(Request $request)
    {
        $request->validate([
            'tendanhmuc' => 'required|string|max:255',
        ]);

        $danhmuc = Category::create([
            'tendanhmuc' => $request->tendanhmuc,
        ]);
        return response()->json([
            'message' => 'Them danh muc thanh cong',
            'danhmuc' => $danhmuc,
        ], 201);
    }

    // Sửa danh mục
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'danh muc khong ton tai',
            ], 404);
        }
        $request->validate([
            'tendanhmuc' => 'required|string|max:255',
        ]);

        $category->update([
            'tendanhmuc' => $request->tendanhmuc,
        ]);

        return response()->json([
            'message' => 'cap nhat danh muc thanh cong',

        ], 200);
    }


    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Danh muc khong ton tai',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Xoa danh muc thanh cong',
        ], 200);
    }
}
