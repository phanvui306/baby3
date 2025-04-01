<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response; //
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BienThe;
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
        // Validate dữ liệu
        $validated = $request->validate([
            'tensanpham' => 'required|string|max:255',
            'mota' => 'required|string',
            'iddanhmuc' => 'required|integer|exists:danh_muc,id',
            'variants' => 'required|array',  // Đảm bảo có ít nhất một biến thể
            'variants.*.mau' => 'required|string|max:50',
            'variants.*.kichco' => 'required|string|max:50',
            'variants.*.gia' => 'required|integer',
        ]);

        // Tạo sản phẩm mới
        $product = Product::create([
            'tensanpham' => $validated['tensanpham'],
            'mota' => $validated['mota'],
            'iddanhmuc' => $validated['iddanhmuc'],
        ]);

        // Tạo biến thể cho sản phẩm
        foreach ($validated['variants'] as $variantData) {
            $product->variants()->create($variantData);
        }

        return response()->json(['message' => 'Sản phẩm và biến thể đã được tạo thành công!'], 201);
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
            'iddanhmuc' => 'required|exists:danh_muc,id',
            'variants' => 'required|array|min:1',
            'variants.*.mau' => 'required|string',
            'variants.*.kichco' => 'required|string',
            'variants.*.gia' => 'required|numeric',
        ]);

        // Cập nhật sản phẩm
        $product->update([
            'tensanpham' => $request->tensanpham,
            'mota' => $request->mota,
            'sphot' => (int) $request->sphot,
            'iddanhmuc' => $request->iddanhmuc
        ]);

        $product->variants()->delete();
        foreach($request->variants as $bienthe){
            $product->variants()->create($bienthe);
        }

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
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'message' => 'Xoá sản phẩm thành công',
        ], 200);
    }
}
