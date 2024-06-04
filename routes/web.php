<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use Illuminate\Support\Facades\Auth;

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

// Client routes
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/shop', [ShopController::class, 'index'])->name('products.list');
Route::get('/shop/search', [ShopController::class, 'searchByName'])->name('search');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('order');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('send-contact');

Route::get('/product-detail/{id}', [HomeController::class, 'show'])->name('client.product.show');

Route::get('product/{category_id}', [ClientProductController::class, 'index'])->name('client.product.index');
Route::get('/product-detail/{id}', [ClientProductController::class, 'show'])->name('client.product.show');

Route::get('/products/filter', [ShopController::class, 'filter'])->name('products.filter');




Auth::routes();

// Admin routes
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('coupons', CouponController::class);
});


