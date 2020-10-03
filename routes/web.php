<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

//  Admin routes
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware' => ['auth'=>'admin']], function () {
  Route::get('/dashboard','DashboardController@index')->name('dashboard');
  Route::resource('product', 'ProductController');
  Route::resource('category', 'CategoryController');
  Route::resource('brand', 'BrandController');
  Route::resource('coupon', 'CouponController');
  Route::resource('slider', 'SliderController');
  Route::get('review', 'ReviewController@index')->name('review.index');
  Route::get('review/{id}', 'ReviewController@show')->name('review.show');
  Route::get('users', 'UserController@index')->name('user.index');
  Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');

});

// User routes
Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware' => ['auth'=>'user']], function () {
  Route::get('/dashboard','DashboardController@index')->name('dashboard');
});

Route::get('/','ProductController@getProduct')->name('home');
Route::get('/products','ProductController@Products')->name('products');
Route::get('product/details/{slug}','ProductController@details')->name('details');
Route::get('brand/{slug}','ProductController@productByBrand')->name('brand.product');
Route::get('category/{slug}','ProductController@productByCat')->name('category.product');
Route::get('/search','ProductController@search')->name('search');
Route::get('/price/range','ProductController@priceRange')->name('price.range');
Route::post('/review','ReviewController@storeReview')->name('review.store');

// Cart routes
Route::get('cart','CartController@cart')->name('cart')->middleware('auth');
Route::get('add-cart/{product}','CartController@addToCart')->name('add.cart')->middleware('auth');
Route::get('update/{id}','CartController@update')->name('update.cart')->middleware('auth');
Route::get('remove/{id}','CartController@remove')->name('cart.remove')->middleware('auth');

Route::get('checkout','CartController@checkout')->name('checkout')->middleware('auth');
