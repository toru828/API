<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HelloWorldController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\ProductController;

Route::get('hello-world-with-controller', [HelloWorldController::class,'index']);

Route::get('hello-world', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return ['data' => ['message'=>'Hello World API']];
});


// Route::get('articles', [ArticleController::class,'index']);
// Route::get('articles/{id}', [ArticleController::class,'show']);
// Route::post('articles', [ArticleController::class,'store']);
// Route::put('articles/{id}', [ArticleController::class,'update']);
// Route::delete('articles/{id}', [ArticleController::class,'delete']);


// Route::get('articles', [ArticleController::class,'index']);
// Route::get('articles/{article}', [ArticleController::class,'show']);
// Route::post('articles', [ArticleController::class,'store']);
// Route::put('articles/{article}', [ArticleController::class,'update']);
// Route::delete('articles/{article}', [ArticleController::class,'delete']);

Route::get('example-api-crud', [ArticleController::class,'index']);
Route::get('example-api-crud/{article}', [ArticleController::class,'show']);
Route::post('example-api-crud', [ArticleController::class,'store']);
Route::put('example-api-crud/{article}', [ArticleController::class,'update']);
Route::delete('example-api-crud/{article}', [ArticleController::class,'delete']);

Route::post('register', [RegisterController::class,'register']);
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);


Route::middleware(['auth:api'])->group(function () {
    Route::get('articles', [ArticleController::class,'index']);
    Route::get('articles/{article}', [ArticleController::class,'show']);
    Route::post('articles', [ArticleController::class,'store']);
    Route::put('articles/{article}', [ArticleController::class,'update']);
    Route::delete('articles/{article}', [ArticleController::class,'delete']);
});

    // get-all
    Route::get('products', [ProductController::class,'index']);

    // get-by-product-no
    Route::get('products/{product}', [ProductController::class,'show']);
    
    Route::put('products/{product}', [ProductController::class,'update']);
    Route::delete('products/{product}', [ProductController::class,'delete']);

    // Create with authentication
Route::middleware(['auth:api'])->group(function () {
    Route::post('products', [ProductController::class,'store']);
});