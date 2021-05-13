<?php

use App\Http\Controllers\Frontend\CategoryProductsController;
use App\Http\Controllers\Frontend\ChefProductsController;
use App\Http\Controllers\Frontend\SingleProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;


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


Route::get('/', \App\Http\Controllers\Frontend\HomeController::class)->name('welcome');
Route::get('product/{product:slug}',[SingleProductController::class,'index'])->name('single.product');
Route::get('category/{category:slug}',CategoryProductsController::class)->name('category.products');
Route::get('chefs/{user:slug}',ChefProductsController::class)->name('chef.products');



Auth::routes();

//TODO put in admin group
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UsersController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('products',ProductsController::class);
