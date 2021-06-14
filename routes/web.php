<?php

use App\Http\Controllers\Frontend\CategoryProductsController;
use App\Http\Controllers\Frontend\ChefProductsController;
use App\Http\Controllers\Frontend\SingleProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContinueShoppingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\ChefRequestController;
use App\Http\Controllers\Admin\OrderController;





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

Route::get('/about-us', function(){
    return view('frontend.static.about');
})->name('about');

Route::get('/contact-us', function(){
    return view('frontend.static.contact');
})->name('contact');

Route::get('/frequently-asked', function(){
    return view('frontend.static.faq');
})->name('faq');

Route::get('/terms-and-conditions', function(){
    return view('frontend.static.tnc');
})->name('tnc');

Route::get('/privacy-policy', function(){
    return view('frontend.static.privacy');
})->name('privacy');

Route::get('/become-chef', function(){
    return view('frontend.static.become-chef');
})->name('upgrade');

Route::get('/thank-you', function(){
    return view('frontend.static.thankyou');
})->name('thankyou');







Route::get('/', \App\Http\Controllers\Frontend\HomeController::class)->name('welcome');
Route::get('categories-list', \App\Http\Controllers\Frontend\CategoriesList::class)->name('list.category');
Route::get('products-list', \App\Http\Controllers\Frontend\ProductsList::class)->name('list.product');
Route::get('product/{product:slug}',[SingleProductController::class,'index'])->name('single.product');
Route::get('category/{category:slug}',CategoryProductsController::class)->name('category.products');
Route::get('chefs/{user:slug}',ChefProductsController::class)->name('chef.products');
Route::get('catering-product', \App\Http\Controllers\Frontend\CateringProductsController::class)->name('catering.products');
Route::post('contact', \App\Http\Controllers\Frontend\ContactController::class)->name('contact.mail');
Route::post('chef-registery', \App\Http\Controllers\Frontend\BecomeChefController::class)->name('become.chef');


Route::post('/addTo/cart', [CartController::class, 'addToCart'])->name('cart');
Route::get('/cart',[CartController::class, 'index'])->name('cart.view');
Route::post('increase-quantity',[CartController::class, 'incrementQuantity'])->name('cart.increment');
Route::post('decrease-quantity',[CartController::class, 'decrementQuantity'])->name('cart.decrement');

Route::get('continue-shopping',ContinueShoppingController::class)->name('cart.continue.shopping');
Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout',[CheckoutController::class,'store'])->name('cart.checkout');





Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
//TODO put in admin group
Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
Route::resource('users', UsersController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('products',ProductsController::class);

Route::post('orders/change-status',[OrderController::class, 'changeStatus'])->name('orders.change.status');

Route::get('orders',[OrderController::class, 'index'])->name('orders');
Route::get('orders/{id}',[OrderController::class, 'show'])->name('orders.view');

Route::get('enquiries',[EnquiryController::class,'index'])->name('enquiries');
Route::get('enquiries/{id}',[EnquiryController::class,'show'])->name('enquiries.view');

Route::get('chefregisters',[ChefRequestController::class,'index'])->name('chefRegisters');
Route::get('chefregisters/{id}',[ChefRequestController::class,'show'])->name('chefRegister.view');
});

