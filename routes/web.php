<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
//show products for user add to cart
Route::get('/products', [ProductController::class, 'index']
);
//cart
Route::get('/products/add-to-cart/{id}', [ProductController::class,'addToCart'])->name(name: 'addToCart');
//show cart
Route::get('/products/show-cart', [ProductController::class,'showCart'])->name(name: 'showCart');
//update cart
Route::get('/products/update-cart', [ProductController::class,'updateCart'])->name(name: 'updateCart');
//delete cart
Route::get('/products/delete-cart', [ProductController::class,'deleteCart'])->name(name: 'deleteCart');