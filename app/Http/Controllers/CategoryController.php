<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Gets all categories
    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    //updates categories
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if($category == null){
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->categoryName = $request->categoryName;
        $category->comissionPercentage = $request->comissionPercentage;
        $category->save();
        return response()->json($category, 200);
    }

    //creates a new category
    public function newCategory(Request $request)
    {
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->comissionPercentage = $request->comissionPercentage;
        $category->save();
        return response()->json($category, 201);
    }

    //Deletes a category using ID
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category == null){
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Category deleted'], 200);
    }


}
