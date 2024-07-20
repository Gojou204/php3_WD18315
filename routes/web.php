<?php

use App\Http\Controllers\HoangnvController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/// GET , POST , PUT , PATCH , DELETE (method http)
// Base url: http://127.0.0.1:8000

// http://127.0.0.1:8000/test
// Đặt tên: danh-sach-san-pham
Route::get('test', function() {
    echo '123';
});

// http://127.0.0.1:8000/
Route::get('/', function() {
    echo 'Trang chủ';
});

// Route::get('list-product', [ProductController::class, 'showProduct']);
Route::get('thongtinsv', [HoangnvController::class, 'showThongtinSV']);

// Truyền dữ liệu từ Route => Controller

// Slug
// http://127.0.0.1:8000/get-product/3
// Route::get('get-product/{id}/{name?}', [ProductController::class, 'getProduct']);

// Params
// http://127.0.0.1:8000/update-product?id=3&name=iphone
// Route::get('update-product', [ProductController::class, 'updateProduct']);


Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
    Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');
    Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');
    Route::post('add-users', [UserController::class, 'addPostUsers'])->name('addPostUsers');
    Route::get('delete-users/{userId}', [UserController::class, 'deleteUsers'])->name('deleteUsers');
    Route::get('update-users/{userId}', [UserController::class, 'updateUsers'])->name('updateUsers');
    Route::post('update-users', [UserController::class, 'updatePostUsers'])->name('updatePostUsers');
});

// Lab2
Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
    Route::get('list-products', [ProductController::class, 'listProducts'])->name('listProducts');
    Route::get('add-products', [ProductController::class, 'addProducts'])->name('addProducts');
    Route::post('add-products', [ProductController::class, 'addPostProducts'])->name('addPostProducts');
    Route::get('delete-products/{productId}', [ProductController::class, 'deleteProducts'])->name('deleteProducts');
    Route::get('update-products/{productId}', [ProductController::class, 'updateProducts'])->name('updateProducts');
    Route::post('update-products', [ProductController::class, 'updatePostProducts'])->name('updatePostProducts');
    Route::get('search', [ProductController::class, 'searchProducts'])->name('searchProducts');
});