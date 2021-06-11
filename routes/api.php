<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
//use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', [ArticleController::class,'selectAll']);
Route::get('articles/{article}', [ArticleController::class,'selectOneItem']);
Route::post('articles', [ArticleController::class,'insert']);
Route::put('articles/{article}', [ArticleController::class,'update']);
Route::delete('articles/{article}', [ArticleController::class,'delete']);
Route::post('register', [RegisterController::class,'register']);
Route::get('register', [RegisterController::class,'selectAll']);