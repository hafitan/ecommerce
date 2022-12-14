<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;


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

Route::get('product' , [App\Http\Controllers\admin\ProductController::class, 'index']);
Route::get('category' , [App\Http\Controllers\admin\CategoryController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Auth::routes();

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'auth','1'], function(){
        Route::resource('order', Admin\OrderController::class);
        Route::resource('listOrder', Admin\ListOrderController::class);
        Route::resource('product', Admin\ProductController::class);
        Route::resource('category', Admin\CategoryController::class);
        Route::resource('user', Admin\UserController::class);
        Route::resource('charts' , ChartsController::class);
        Route::post('restock' , 'Admin\ProductController@restock')->name('restock');
        Route::post('reorder', 'Admin\OrderController@reorder')->name('reorder');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('adminHome', [HomeController::class, 'adminHome'])->name('adminHome')->middleware('is_admin');
});
    Route::group(['middleware' => 'auth', 0], function(){
        Route::post('chart' , 'ShopController@chart')->name('chart');
        Route::get('cart' , 'ShopController@cart')->name('cart');
        Route::post('keranjang' , 'ShopController@keranjang')->name('keranjang');
        Route::post('checkout' , 'ShopController@bcheckout')->name('bcheckout');
        Route::get('checkout/{id}' , 'ShopController@checkout')->name('checkout');
        Route::post('buy' , 'ShopController@buy')->name('buy');
        Route::get('single/{id}' , 'ShopController@single')->name('single');
        Route::resource('shop' , ShopController::class);
    });