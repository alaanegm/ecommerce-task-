<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// List all categories
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');

// Create a new category (show the form)
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
// search  an existing category

Route::get('/categories/search', [CategoryController::class, 'search'])->name('category.search');
Route::post('/categories/products', [CategoryController::class, 'getCategoryProducts'])->name('category.getProducts');

// Display a specific category
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

// Store a new category (process the form submission)
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');

// Edit an existing category (show the edit form)
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

// Update an existing category (process the edit form submission)
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');

// Delete an existing category
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

// List all Products
Route::get('/products', [ProductController::class, 'index'])->name('product.index');

// Create a new products (show the form)
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

// Display a specific products
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

// Store a new products (process the form submission)
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

// Edit an existing products (show the edit form)
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Update an existing products (process the edit form submission)
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

// Delete an existing products
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

// List all shops
Route::get('/shops', [ShopController::class, 'index'])->name('shop.index');

// Create a new products (show the form)
Route::get('/shops/create', [ShopController::class, 'create'])->name('shop.create');

// Display a specific products
Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shop.show');

// Store a new products (process the form submission)
Route::post('/shops', [ShopController::class, 'store'])->name('shop.store');

// Edit an existing products (show the edit form)
Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shop.edit');

// Update an existing products (process the edit form submission)
Route::put('/shops/{shop}', [ShopController::class, 'update'])->name('shop.update');

// Delete an existing products
Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shop.destroy');
Route::get('/latest-products', [ShopController::class, 'getLatestShopProducts'])->name('latest-products');

// Create a new order (show the form)

Route::get('/orders/create/{shop}', [OrderController::class, 'create'])->name('order.create');
Route::post('/shops/{shop}/orders', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

