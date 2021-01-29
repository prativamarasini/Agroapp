<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.frontend.pages.main');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','backendcontroller@index')->name('backend.index');
Route::resource('/dashboard/category','CategoryController');
Route::resource('/dashboard/product','productcontroller');
Route::get('/dashboard/product/getProductInfo/{id}','productcontroller@getProductInfo')->name('product.getProductInfo');
Route::get('/dashboard/product/getAvailableInfo/{id}','productcontroller@getAvailableInfo')->name('product.getAvailableInfo');

Route::resource('/dashboard/farmer','farmercontroller');
Route::resource('/dashboard/customer','customercontroller');
Route::resource('/dashboard/payment','paymentcontroller');
Route::resource('/dashboard/transaction','transactioncontroller');
Route::resource('/dashboard/ordertable','ordertablecontroller');