<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ShopController;

use App\Http\Controllers\Client\ProductController as ClientProductController;

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

// Admin routes
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


// Client routes
Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/shop', [ShopController::class, 'index'])->name('products.list');

Route::get('/product-detail/{id}', [HomeController::class, 'show'])->name('client.product.show');

Route::get('product/{category_id}', [ClientProductController::class, 'index'])->name('client.product.index');
Route::get('/product-detail/{id}', [ClientProductController::class, 'show'])->name('client.product.show');
