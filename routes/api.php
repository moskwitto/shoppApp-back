<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout']);
Route::get('user', [AuthController::class, 'userProfile']);


//Product routes
Route::post('newProduct', [ProductController::class, 'newProduct']);
Route::get('products', [ProductController::class, 'getAllProducts']);
Route::get('product/{id}', [ProductController::class, 'getProductByID']);
Route::get('getProductsByName/{name}', [ProductController::class, 'getProductsByName']);
Route::post('updateProduct/{id}', [ProductController::class, 'updateProduct']);
Route::delete('deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
Route::get('getProductsByCategory/{categoryID}', [ProductController::class, 'getProductsByCategoryID']);
Route::get('getProductsByCategoryName/{categoryName}', [ProductController::class, 'getProductsByCategoryName']);
Route::get('getProductsByVendor/{vendorID}', [ProductController::class, 'getProductsByVendor']);

//Category routes
Route::post('newCategory', [CategoryController::class, 'newCategory']);
Route::get('categories', [CategoryController::class, 'getAllCategories']);
Route::post('updateCategory/{id}', [CategoryController::class, 'updateCategory']);

// Product-detail routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product-detail/{id}', [ProductDetailController::class, 'getProductDetailByID']);
Route::put('product-detail/{id}/edit', [ProductDetailController::class, 'update']);
Route::delete('product-detail/{id}', [ProductDetailController::class, 'destroy']);
Route::get('product-detail/{id}/edit', [ProductDetailController::class, 'edit']);
Route::post('product-detail', [ProductDetailController::class, 'uploadProductDetail']);

