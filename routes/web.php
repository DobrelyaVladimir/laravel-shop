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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');
Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('brands');
Route::get('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'brand'])->name('brand');
Route::get('/basket',[\App\Http\Controllers\BasketController::class, 'basket'])->name('basket');
Route::get('/basket/place',[\App\Http\Controllers\BasketController::class, 'basketPlace'])->name('basket-place');
Route::post('/basket/add/{id}', [\App\Http\Controllers\BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/basket/remove/{id}', [\App\Http\Controllers\BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/basket/place',[\App\Http\Controllers\BasketController::class, 'basketConfirm'])->name('basket-confirm');
