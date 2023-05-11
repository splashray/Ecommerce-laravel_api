<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        "name" => "required",
        "slug" => "required",
        "price" => "required",

      ]);
      return Product::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => "Product with Id - $id not found",
                'success' => false
            ], 404);
        }
        
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => "Product with Id - $id not found",
                'success' => false
            ], 404);
        }
    
        $product->update($request->all());
    
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }

    
    /**
     * Search for a name
     */
    public function search($name)
    {
        return Product::where('name', 'like','%'.$name. '%')->get();
    }
    
}
