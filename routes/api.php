<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\loginControllerNew;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api shop
Route::apiResource('products', ProductController::class);
// api cart
Route::get('carts',[CartController::class,'getAllCart']);
Route::post('add_to_cart',[CartController::class,'addToCart']);
Route::put('update_cart',[CartController::class,'update']);
Route::delete('remove_cart/{id}',[CartController::class,'removeToCart']);
Route::post('checkout',[CartController::class,'checkout']);
Route::get('login',[loginControllerNew::class,'login']);
Route::get('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('aaa',function(){
    echo 12345;
});

