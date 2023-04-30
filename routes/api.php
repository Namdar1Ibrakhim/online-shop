<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProviSder within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('products', 'App\Http\Controllers\RestController@products')->middleware('auth:sanctum');
Route::get('categories', 'App\Http\Controllers\RestController@categories')->middleware('auth:sanctum');
Route::get('orders', 'App\Http\Controllers\RestController@orders')->middleware('auth:sanctum');

Route::post('addtocart', 'App\Http\Controllers\RestController@addtocart')->middleware('auth:sanctum');
Route::get('cart', 'App\Http\Controllers\RestController@cart')->middleware('auth:sanctum');
Route::get('mycart', 'App\Http\Controllers\RestController@mycart')->middleware('auth:sanctum');
Route::get('deletecart', 'App\Http\Controllers\RestController@deletecart')->middleware('auth:sanctum');

Route::get('makeOrder', 'App\Http\Controllers\RestController@makeOrder')->middleware('auth:sanctum');





