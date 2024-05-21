<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Http\Requests\storeProductDetail;

class ProductDetailController extends Controller
{
    public function getProductDetailByID(Request $request, $id)
    {
        $productDetail = ProductDetail::find($id); 
        if($productDetail == null){
            return response()->json(['message' => 'ProductDetail not found'], 404);
        }
        return response()->json($productDetail, 200);
    }
    public function uploadProductDetail(storeProductDetail $request){
        productdetail::create($request->validated()); 
        return response()->json(['ProductDetail created']);
    }
}
