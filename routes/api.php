<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::get('products', 'ProductController@index')->name('列出所有商品API');
Route::get('payments', 'PaymentController@index')->name('列出所有訂單API');
Route::middleware('auth:api')->post('newPayment', 'PaymentController@new')->name('建立訂單API');
Route::middleware('auth:api')->post('payment/{payment_id}', 'PaymentController@show')->name('訂單細節API');

// Route::apiResource('product', 'ProductController');
// Route::apiResource('payment', 'PaymentController');
