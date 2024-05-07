<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class ProductController extends Controller{
    
    public function getProductByID($id)
    {
        $product = Product::find($id);
        if($product == null){
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    public function newProduct(Request $request)
    {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryID = $request->categoryID;
        $product->price = $request->price;
        $product->stockAmount = $request->stockAmount;
        $product->vendorID = $request->vendorID;
        $product->productDescription = $request->productDescription;
        $product->save();
        return response()->json($product, 201);
    }
    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function getProductsByCategory($categoryID)
    {
        $products = Product::where('categoryID', $categoryID)->get();
        return response()->json($products, 200);
    }

    public function getProductsByVendor($vendorID)
    {
        $products = Product::where('vendorID', $vendorID)->get();
        return response()->json($products, 200);
    }

    public function getProductsByName($name)
    {
        $products = Product::whereRaw('LOWER(productName) LIKE ?', ['%'.strtolower($name).'%'])->get();
        return response()->json($products, 200);
    }

    public function getProductsByCategoryName($name)
    {
        $products = Product::whereHas('category', function ($query) use ($name) {
            $query->where('categoryName', 'like', '%' . $name . '%');
        })->get();

        return response()->json($products, 200);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product == null){
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if($product == null){
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->productName = $request->productName;
        $product->categoryID = $request->categoryID;
        $product->price = $request->price;
        $product->stockAmount = $request->stockAmount;
        $product->vendorID = $request->vendorID;
        $product->productDescription = $request->productDescription;
        $product->save();
        return response()->json($product, 200);
    }

}
