<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/',  [UserController::class,'index'])->name(name:'indexhome');
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
Route::get('/products/cart-thanhtoan',[CartController::class,'thanhtoan'])->name(name:'thanhtoan');
Route::get('/login', [UserController::class,'login'])->name(name:'login');
Route::get('/shopall', [UserController::class,'shopall'])->name(name:'shopall');

Route::get('/products/detai/{id}', [ProductController::class,'productDetail'])->name(name:'productDetail');
Route::get('/tops', [UserController::class,'tops'])->name(name:'tops');
Route::get('/bottoms', [UserController::class,'bottoms'])->name(name:'bottoms');
Route::get('/outerwear', [UserController::class,'outerwear'])->name(name:'outerwear');
Route::get('/registration', [UserController::class,'registration'])->name(name:'registration');
Route::post('/register-user', [UserController::class,'registerUser'])->name('register-user');
Route::post('/login-user', [UserController::class,'loginUser'])->name('login-user');
Route::get('/home',[UserController::class,'home'])->name(name:'home');
Route::get('/logout',[UserController::class,'logout']);
Route::get('/search', [UserController::class,'search'])->name(name:'search');
Route::post('/searchsp', [UserController::class,'searchsp'])->name('search-sp');
Route::get('/search-donhang', [UserController::class,'searchDonhang']);
Route::post('/search-donhang', [UserController::class,'searchDonhang1'])->name('search-sp');
Route::get('/donhang-chitiet/{id}', [UserController::class,'donhangchitiet'])->name(name:"detaidonhang");

  Route::get('/adminhome',[UserController::class,'adminhome']);
    Route::get('/adminhome/addproduct',[UserController::class,'addproduct'])->name(name:'addproduct');
//    Route::post('/addproducts', [AdminProductController::class,'addproducts'])->name('add-products');
    Route::post('/add-products', [AdminProductController::class,'addproducts'])->name('add-products');

    Route::get('/adminproduct/update/{id}', [AdminProductController::class,'updateproduct']);
    Route::post('/update-products/{id}', [AdminProductController::class,'updateproducts']);
    Route::get('/delete-products/{id}', [AdminProductController::class,'deleteproducts']);
    
    Route::get('/adminhome/admindonhang',[AdminProductController::class,'admindonhang']);
    Route::get('/adminhome/donhang-chitiet/{id}', [AdminProductController::class,'admindonhangchitiet'])->name(name:"admindetaidonhang");
    Route::get('/adminhome/admindonhang/{id}', [AdminProductController::class,'updateadmindonhang']);

 