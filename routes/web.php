<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;

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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('log-out');

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function() {
    Route::group(['middleware' => 'is_admin'], function() {
        Route::get('/orders', [OrderController::class, 'index'])->name('home');
    });

    Route::resource('categories', 'CategoryController');
});

Route::group(['prefix' => 'basket'], function() {
    Route::post('/add/{product_id}', [BasketController::class, 'basketAdd'])->name('basket-add');
    
    Route::group([
        'middleware' => 'basket_not_empty',
    ], function() {
        Route::get('/', [BasketController::class, 'basket'])->name('basket');
        Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
        Route::post('/remove/{product_id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
        Route::post('/confirm', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
    });
});


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');


Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
