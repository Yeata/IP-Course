<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //--- Get /api/product
    public function getProducts(){
        return response()->json(Product::with('category')->get());
    }

    //--- Post /api/product
    public function createProduct() {
        $request->validate([
            'name' => 'required|string|max:255',
            'pricing' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'images' => 'nullable|string', // Images stored as text
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    //--- Get /api/product/{productId}
    public function getProduct($productId)  {
        return response()->json(Product::with('category')->findOrFail($productId));
    }

    //--- Patch /api/product/{productId}
    public function updateProduct($productId) {
        $product = Product::findOrFail($productId);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'pricing' => 'sometimes|numeric',
            'category_id' => 'sometimes|exists:categories,id',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }
    //--- Delete /api/product/{productId}
    public function deleteProduct($productId) {
        $product = Product::findOrFail($productId);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
