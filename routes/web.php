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



Route::group(['middleware' => 'auth','admin'], function(){
    Route::resource('order', OrderController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth','admin'], function(){
    Route::resource('product', ProductController::class);
});
//Route::post('product' , [App\Http\Controllers\ProductController::class , 'restock']);
Route::group(['middleware' => 'auth','admin'], function(){
    Route::resource('category', CategoryController::class);
});

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

