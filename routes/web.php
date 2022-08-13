<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


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

Route::get('product' , [App\Http\Controllers\ProductController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');




Auth::routes();

Route::post('restock' , 'ProductController@restock')->name('restock');
Route::get('single/{id}' , 'ShopController@single')->name('single');
Route::post('chart' , 'ShopController@chart')->name('chart');
Route::post('keranjang' , 'ShopController@keranjang')->name('keranjang');
Route::get('checkout' , 'ShopController@checkout')->name('checkout');
Route::post('bcheckout' , 'ShopController@bcheckout')->name('bcheckout');

Route::group(['middleware' => 'auth','admin'], function(){
    Route::resource('order', OrderController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('charts' , ChartsController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// route admin dashboard
Route::get('adminHome', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::resource('shop' , ShopController::class);
