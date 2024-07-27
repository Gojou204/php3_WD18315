<?php

// use App\Http\Controllers\HoangnvController;

use App\Http\Controllers\AuthenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\UserController;



/// GET , POST , PUT , PATCH , DELETE (method http)
// Base url: http://127.0.0.1:8000

// http://127.0.0.1:8000/test
// Đặt tên: danh-sach-san-pham
// Route::get('test', function() {
//     echo '123';
// });

// // http://127.0.0.1:8000/
// Route::get('/', function() {
//     echo 'Trang chủ';
// });

// // Route::get('list-product', [ProductController::class, 'showProduct']);
// Route::get('thongtinsv', [HoangnvController::class, 'showThongtinSV']);

// Truyền dữ liệu từ Route => Controller

// Slug
// http://127.0.0.1:8000/get-product/3
// Route::get('get-product/{id}/{name?}', [ProductController::class, 'getProduct']);

// Params
// http://127.0.0.1:8000/update-product?id=3&name=iphone
// Route::get('update-product', [ProductController::class, 'updateProduct']);


// Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
//     Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');
//     Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');
//     Route::post('add-users', [UserController::class, 'addPostUsers'])->name('addPostUsers');
//     Route::get('delete-users/{userId}', [UserController::class, 'deleteUsers'])->name('deleteUsers');
//     Route::get('update-users/{userId}', [UserController::class, 'updateUsers'])->name('updateUsers');
//     Route::post('update-users', [UserController::class, 'updatePostUsers'])->name('updatePostUsers');
// });

// // Lab2
// Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
//     Route::get('list-products', [ProductController::class, 'listProducts'])->name('listProducts');
//     Route::get('add-products', [ProductController::class, 'addProducts'])->name('addProducts');
//     Route::post('add-products', [ProductController::class, 'addPostProducts'])->name('addPostProducts');
//     Route::get('delete-products/{productId}', [ProductController::class, 'deleteProducts'])->name('deleteProducts');
//     Route::get('update-products/{productId}', [ProductController::class, 'updateProducts'])->name('updateProducts');
//     Route::post('update-products', [ProductController::class, 'updatePostProducts'])->name('updatePostProducts');
//     Route::get('search', [ProductController::class, 'searchProducts'])->name('searchProducts');
// });

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function(){
    Route::group([
        'prefix' => 'products',
        'as' => 'products.'  
    ], function(){
        // CRUD products
        Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product/{idProduct}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');
    });
});

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
Route::get('register', [AuthenController::class, 'register'])->name('register');
Route::post('register', [AuthenController::class, 'postRegister'])->name('postRegister');
