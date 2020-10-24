<?php

use App\Brand;
use App\Category;
use App\Contact;
use App\Inbox;
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
  Route::resource('blog', 'BlogController');
  Route::resource('brand', 'BrandController');
  Route::resource('coupon', 'CouponController');
  Route::resource('slider', 'SliderController');
  Route::resource('order', 'OrderController');
  Route::get('review', 'ReviewController@index')->name('review.index');
  Route::get('review/{id}', 'ReviewController@show')->name('review.show');
  Route::get('users', 'UserController@index')->name('user.index');
  Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
  Route::get('contact', 'ContactController@edit')->name('contact.edit');
  Route::put('contact/{id}', 'ContactController@update')->name('contact.update');

  Route::get('inbox', 'ContactController@index')->name('inbox.index');
  Route::get('inbox/view/{id}', 'ContactController@show')->name('inbox.show');
  Route::delete('inbox/destroy/{id}', 'ContactController@destroy')->name('inbox.destroy');

});

// User routes
// Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware' => ['auth'=>'user']], function () {
//   Route::get('/dashboard','DashboardController@index')->name('dashboard');
// });

Route::get('/','ProductController@getProduct')->name('home');
Route::get('/products','ProductController@Products')->name('products');
Route::get('product/details/{slug}','ProductController@details')->name('details');
Route::get('brand/{slug}','ProductController@productByBrand')->name('brand.product');
Route::get('category/{slug}','ProductController@productByCat')->name('category.product');
Route::get('/search','ProductController@search')->name('search');
Route::get('/price/range','ProductController@priceRange')->name('price.range');
Route::post('/review','ReviewController@storeReview')->name('review.store');

// Cart routes
Route::get('cart','CartController@cart')->name('cart')->middleware(['auth'=>'user']);
Route::get('add-cart/{product}','CartController@addToCart')->name('add.cart')->middleware(['auth'=>'user']);
Route::get('update/{id}','CartController@update')->name('update.cart')->middleware(['auth'=>'user']);
Route::get('remove/{id}','CartController@remove')->name('cart.remove')->middleware(['auth'=>'user']);
Route::get('checkout','CartController@checkout')->name('checkout')->middleware(['auth'=>'user']);
Route::get('profile','CartController@profile')->name('account')->middleware(['auth'=>'user']);
Route::post('profile/update','CartController@updateProfile')->name('account.update')->middleware(['auth'=>'user']);
Route::post('profile/password/update','CartController@updatePassword')->name('account.password.update')->middleware(['auth'=>'user']);

Route::resource('order', 'OrderController')->middleware(['auth'=>'user']);

Route::get('paypal/checkout/{order}','PaypalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}','PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel','PaypalController@cancelPage')->name('paypal.cancel');


Route::get('contact','ContactController@index')->name('contact.index');
Route::post('contact','ContactController@store')->name('contact.store');
Route::get('blog','ContactController@getBlog')->name('blog');
Route::get('blog/{id}','ContactController@getSingleBlog')->name('blog.single');
view()->composer('layouts.app', function ($view) {
    $companyinfo=Contact::where('id','1')->first();
     $view->with('companyinfo',$companyinfo,);
});
view()->composer('layouts.sidebar', function ($view) {
    $categories=Category::latest()->get();
     $view->with('categories',$categories);
});
view()->composer('layouts.sidebar', function ($view) {
    $brands=Brand::latest()->get();
     $view->with('brands',$brands);
});
view()->composer('admin.layout.app', function ($view) {
    $inbox=Inbox::where('status','unseen')->latest()->get();
     $view->with('inbox',$inbox);
});

//Not found
Route::get('*','ProductController@notfound')->name('notfound');
