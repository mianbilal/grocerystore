<?php

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

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('welcome');
Route::get('/fruits/{id}', [App\Http\Controllers\FrontEndController::class, 'fruits'])->name('single.fruit');
Route::get('/vegitables/{id}', [App\Http\Controllers\FrontEndController::class, 'vegitables'])->name('single.vegitable');
Route::post('/cart/add', [App\Http\Controllers\ShoppingController::class, 'cartadd'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\ShoppingController::class, 'cart'])->name('cart');
Route::get('/cart/delete/{id}', [App\Http\Controllers\ShoppingController::class, 'cartdelete'])->name('cart.delete');
Route::get('/cart/add/{id}', [App\Http\Controllers\ShoppingController::class, 'cartaddto'])->name('cart.add.to');
Route::get('/cart/decr/{id}/', [App\Http\Controllers\ShoppingController::class, 'cartdecr'])->name('cart.decr');
Route::get('/cart/incr/{id}/', [App\Http\Controllers\ShoppingController::class, 'cartincr'])->name('cart.incr');
Route::get('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('cart.checkout');
Route::post('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'pay'])->name('cart.checkout');
Route::get('/cart', [App\Http\Controllers\ShoppingController::class, 'cart'])->name('cart');
Route::get('/cart/clear', [App\Http\Controllers\ShoppingController::class, 'cartclear'])->name('cart.clear');


Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
    Route::post('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');


    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/admin/{id}', [App\Http\Controllers\UserController::class, 'admin'])->name('user.admin');
    Route::get('/user/notadmin/{id}', [App\Http\Controllers\UserController::class, 'notadmin'])->name('user.not.admin');

    Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.grocery');
    Route::post('settings/update', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
});
