<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('products', ProductController::class)->except(['show']);
Route::resource('categories', CategoryController::class);
Route::get('/products/{categoryId}', [ProductController::class, 'getProductsByCategory'])->name('products.getProductsByCategory');

