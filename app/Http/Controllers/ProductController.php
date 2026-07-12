<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. READ ALL (GET /api/products) -> Sudah jalan sebelumnya
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Produk Berhasil Diambil via API',
            'data' => $products
        ], 200);
    }

    // 2. CREATE (POST /api/products) -> Solusi Error 405 Anda
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'supplier_id'   => 'required|integer',
            'sku'           => 'required|string|unique:products,sku',
            'name'          => 'required|string|max:255',
            'stock'         => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'price'         => 'required|numeric|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Produk Berhasil Ditambahkan via API',
            'data' => $product->load('category')
        ], 201);
    }

    // 3. READ SINGLE (GET /api/products/{id})
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Produk Tidak Ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail Data Produk Berhasil Diambil via API',
            'data' => $product
        ], 200);
    }

    // 4. UPDATE (PUT/PATCH /api/products/{id})
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Produk Tidak Ditemukan'
            ], 404);
        }

        // 'sometimes' berarti field tersebut hanya divalidasi jika dikirimkan oleh Postman
        $validated = $request->validate([
            'category_id'   => 'sometimes|required|exists:categories,id',
            'supplier_id'   => 'sometimes|required|integer',
            'sku'           => 'sometimes|required|string|unique:products,sku,' . $id,
            'name'          => 'sometimes|required|string|max:255',
            'stock'         => 'sometimes|required|integer|min:0',
            'minimum_stock' => 'sometimes|required|integer|min:0',
            'price'         => 'sometimes|required|numeric|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Produk Berhasil Diubah via API',
            'data' => $product->load('category')
        ], 200);
    }

    // 5. DELETE (DELETE /api/products/{id})
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Produk Tidak Ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Produk Berhasil Dihapus via API'
        ], 200);
    }
}