<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/products', 'productCar');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product-register/{product?}', 'indexRegister');
    Route::get('/product-view', 'indexView')->name('produtoView');
    Route::get('/product-detail/{product}', 'indexDetail');
    Route::post('/product-register', 'store');
    Route::put('/product-register', 'update');
    Route::delete('/product-register/{product}', 'delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user-register', 'indexRegister');
});

