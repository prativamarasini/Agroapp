<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


 Route::get('categories','api\CategoryController@getAllCategories');
 Route::post('categories','api\CategoryController@store');
 Route::get('categories/{id}','api\CategoryController@edit');
 Route::post('categories/{id}','api\CategoryController@update');
 Route::delete('categories/{id}','api\CategoryController@destroy');

 Route::get('products','api\ProductController@getAllProducts');
 Route::post('products','api\ProductController@store');
 Route::get('products/{id}','api\ProductController@show');
 Route::get('products/{id}','api\ProductController@edit');
 Route::post('products/{id}','api\ProductController@update');
 Route::delete('products/{id}','api\ProductController@destroy');

 
 Route::get('orders','api\OrdertableController@getAllOrders');
 Route::post('orders','api\OrdertableController@store');
 Route::get('orders/{id}','api\OrdertableController@show');
 Route::get('orders/{id}','api\OrdertableController@edit');
 Route::post('orders/{id}','api\OrdertableController@update');
 Route::delete('orders/{id}','api\OrdertableController@destroy');


 Route::get('payments','api\PaymentController@getAllPayments');
 Route::post('payments','api\PaymentController@store');
 Route::get('payments/{id}','api\PaymentController@edit');
 Route::post('payments/{id}','api\PaymentController@update');
 Route::delete('payments/{id}','api\PaymentController@destroy');


 Route::get('transactions','api\TransactionController@getAllTransaction');
 Route::post('transactions','api\TransactionController@store');
 Route::get('transactions/{id}','api\TransactionController@show');
 Route::get('transactions/{id}','api\TransactionController@edit');
 Route::post('transactions/{id}','api\TransactionController@update');
 Route::delete('transactions/{id}','api\TransactionController@destroy');

 Route::get('farmers','api\FarmerController@getAllFarmers');
 Route::post('farmers','api\FarmerController@store');
 Route::get('farmers/{id}','api\FarmerController@show');
 Route::get('farmers/{id}','api\FarmerController@edit');
 Route::post('farmers/{id}','api\FarmerController@update');
 Route::delete('farmers/{id}','api\FarmerController@destroy');


 Route::get('customers','api\CustomerController@getAllCustomers');
 Route::post('customers','api\CustomerController@store');
 Route::get('customers/{id}','api\CustomerController@show');
 Route::get('customers/{id}','api\CustomerController@edit');
 Route::post('customers/{id}','api\CustomerController@update');
 Route::delete('customers/{id}','api\CustomerController@destroy');


