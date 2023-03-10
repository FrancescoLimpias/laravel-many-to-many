<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, "indexByCategory"])
    ->name("home");

Route::get('/products', [ProductController::class, "index"])
    ->name("product.home");

Route::get('/products/create', [ProductController::class, "create"])
    ->name("product.create");

Route::post('/products', [ProductController::class, "store"])
    ->name("product.store");
