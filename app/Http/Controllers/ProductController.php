<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response; //
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function getSanPhamMoiNhat()
    {
        $productMoiNhat = Product::orderBy('created_at', 'desc')->get();
        return response()->json($productMoiNhat);
    }

    public function viewProduct()
    {
        return view('admin.products');
    }
    public function viewThemProduct()
    {
        return view('admin.createSanPham');
    }
    public function store(Request $request)
    {
        try {
            // Kiểm tra đầu vào
            $validatedData = $request->validate([
                'tensanpham' => 'required|string|max:255',
                'mota' => 'nullable|string',
                'sphot' => 'nullable|string',
                'iddanhmuc' => 'required|exists:danh_muc,id' // Chú ý kiểm tra đúng bảng
            ]);

            // Tạo sản phẩm
            $product = Product::create($validatedData);

            return response()->json([
                'message' => 'Thêm sản phẩm thành công',
                'product' => $product,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Lỗi khi thêm sản phẩm',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại!'
            ], 404);
        }

        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     */

    public function viewEditProduct()
    {
        return view('admin.update_sanpham');
    }
    public function update(Request $request, $id)
{
    // Tìm sản phẩm theo ID
    $product = Product::find($id);
    
    // Nếu không tìm thấy sản phẩm
    if (!$product) {
        return response()->json([
            'message' => 'Sản phẩm không tồn tại!'
        ], 404);
    }

    // Kiểm tra dữ liệu đầu vào
    $request->validate([
        'tensanpham' => 'required|string|max:255',
        'mota' => 'nullable|string',
        'sphot' => 'nullable|string',
        'iddanhmuc' => 'required|exists:danh_muc,id'
    ]);

    // Cập nhật sản phẩm
    $product->update([
        'tensanpham' => $request->tensanpham,
        'mota' => $request->mota,
        'sphot' => $request->sphot ?? $product->sphot,
        'iddanhmuc' => $request->iddanhmuc
    ]);

    // Trả về phản hồi JSON
    return response()->json([
        'message' => 'Cập nhật sản phẩm thành công!',
        'product' => $product
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
