<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

Route::get('/basket', [MainController::class, 'basket'])->name('basket');

Route::get('/basket/order', [MainController::class, 'basketOrder'])->name('basket-order');