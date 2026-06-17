<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductApiController extends Controller
{
    // GET all products
    public function index()
{
    return ProductResource::collection(Product::all());
}
    // CREATE product
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|unique:products,name',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable'
    ]);

    $product = Product::create($validated);

    return new ProductResource($product);
}

    // GET single product
   public function show(Product $product)
{
    return new ProductResource($product);
}
    // UPDATE product
    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|unique:products,name,' . $product->id,
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable'
    ]);

    $product->update($validated);

    return new ProductResource($product);
}

    // DELETE product
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}