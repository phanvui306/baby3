<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function index(Request $request)
    {

        $hinhanhs = Image::all();

        foreach ($hinhanhs as $hinh) {
            $hinh->hinh = asset('storage/' . $hinh->hinh);
        }

        return response()->json($hinhanhs);
    }

    public function viewHinhAnh()
    {
        return view("admin.image");
    }


    public function viewThemImage()
    {
        return view("admin.createHinhAnh");
    }
    public function themHinhAnh(Request $request)
    {
        $request->validate([
            "idsp" => "required|exists:san_pham,id",
            "hinh" => "required|image|mimes:png,jpg,jpeg,gif|max:2048",
        ]);

        // Lưu ảnh vào thư mục storage/app/public/hinh
        $path = $request->file('hinh')->store('hinh', 'public');


        // Lưu hình vào database
        $hinhAnh = new Image();
        $hinhAnh->idsp = $request->idsp;
        $hinhAnh->hinh = str_replace('public/', 'storage/', $path); // Đổi đường dẫn để truy cập từ trình duyệt
        $hinhAnh->save();

        return response()->json([
            'message' => "Thêm hình ảnh thành công",
            'data' => $hinhAnh
        ], 200);
    }

    public function viewEditImage()
    {
        return view('admin.update_image');
    }
    public function suaHinhAnh(Request $request, $id)
    {
        // Kiểm tra xem file có được gửi hay không
        if (!$request->hasFile('hinh')) {
            return response()->json(['message' => 'Vui lòng chọn hình ảnhhhhh!'], 400);
        }
        $request->validate([
            "hinh" => "required",
        ]);

        // Tìm hình ảnh theo id
        $hinhAnh = Image::find($id);
        if (!$hinhAnh) {
            return response()->json([
                'message' => 'Hình ảnh không tồn tại!',
            ], 404);
        }

        // Xóa hình ảnh cũ nếu có
        if ($hinhAnh->hinh) {
            $oldPath = str_replace('storage/', 'public/', $hinhAnh->hinh); // Chuyển về đường dẫn trong storage
            Storage::delete($oldPath);
        }

        // Lưu ảnh mới vào thư mục storage/app/public/hinh
        $path = $request->file('hinh')->store('public/hinh');

        // Cập nhật đường dẫn hình ảnh trong database
        $hinhAnh->hinh = str_replace('public/', 'storage/', $path);
        $hinhAnh->save();

        return response()->json([
            'message' => "Cập nhật hình ảnh thành công",
            'data' => $hinhAnh
        ], 200);
    }


}
