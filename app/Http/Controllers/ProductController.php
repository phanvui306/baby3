<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm
        return response()->json($products); // Trả về JSON cho frontend
    }
    public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->query('category_id'); // Lấy category_id từ query param

        if (!$categoryId) {
            return response()->json(['message' => 'Category ID is required'], 400);
        }

        $products = Product::where('category_id', $categoryId)->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this category'], 404);
        }

        return response()->json($products);
    }
    public function show($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
}
