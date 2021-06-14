<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // method products/get-all
    public function index()
    {
        return Product::all();
    }

    // method products/get-by-product-no/{id}
    public function show(Product $product)
    {
        return $product;
    }

    // method products/create
    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    // method products/update/{id}
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    // method products/delete/{id}
    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
