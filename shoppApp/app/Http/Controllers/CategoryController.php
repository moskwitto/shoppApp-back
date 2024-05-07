<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    
    public function getAllCategories()
    {
        $categories = Categories::all();
        return response()->json($categories, 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Categories::find($id);
        if($category == null){
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->categoryName = $request->categoryName;
        $category->comissionPercentage = $request->comissionPercentage;
        $category->save();
        return response()->json($category, 200);
    }

    public function newCategory(Request $request)
    {
        $category = new Categories();
        $category->categoryName = $request->categoryName;
        $category->comissionPercentage = $request->comissionPercentage;
        $category->save();
        return response()->json($category, 201);
    }

    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        if($category == null){
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Category deleted'], 200);
    }


}
