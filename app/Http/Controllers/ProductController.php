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
        $product = Product::orderBy('created_at', 'desc')->get(); // Sắp xếp sản phẩm theo mới nhất
        $product = Product::all();
        return response()->json($product);
    }

    public function getSanPhamMoiNhat(){
        $productMoiNhat = Product::orderBy('created_at', 'desc')->get();
        return response()->json($productMoiNhat);
    }

    public function viewProduct(){
        return view('admin.products');
    }
    public function store(Request $request)
    {
        // Kiem Loi truoc khi them san pham

        $request->validate([
            'tensanpham' => 'required|string|max:255',
            'mota' => 'nullable|string',
            'sphot' => 'nullable|string',
            'iddanhmuc' => 'required|exists:danh_muc,id'
        ]);

        $product = Product::create([
            'tensanpham' => $request->tensanpham,
            'mota' => $request->mota,
            'sphot' => $request->sphot,
            'idanhmuc' => $request->iddanhmuc
        ]);

        return response()->json([
            'message' => 'Thêm sản phẩm thành công',
            'product' => $product
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
