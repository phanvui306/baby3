<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    // lấy danh sách danh mục
    public function index()
    {

        $categories = Category::all();
        return view('dsdanhmuc', compact('categories'));
        // return response()->json(Category::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    //
    public function them()
    {
        return view('danhmuc'); // Trả về view thêm danh mục
    }
    //Them danh muc
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


    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Danh mục không tồn tại'
            ], 404);
        }
        return view('editDanhmuc');
    }
    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'message' => 'Danh muc không tồn tại'
            ], 404);
        }

        $request->validate([
            'tendanhmuc' => 'required|string|max:255',
        ]);

        $category->update([
            'tendanhmuc' => $request->tendanhmuc,
        ]);

        return response()->json([
            'message' => 'Cap nhat danh muc thanh cong',
            'data' => $category
        ], 200);
    }
    // xoa danh muc
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Danh muc khong ton tai'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => ' Xoa danh muc thanh cong'
        ], 200);
    }
}
