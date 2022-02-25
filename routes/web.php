<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ItemController;
use App\Models\Cart;
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
    return view('user.welcome');
});

Route::middleware('auth:users')->group(function(){
Route::get('/',[ProductController::class,'index'])->name('products.index');
Route::get('show/{product}',[ProductController::class,'show'])->name('products.show');
});

Route::prefix('cart')->middleware('auth:users')->group(function(){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::post('add',[CartController::Class,'add'])->name('cart.add');
    Route::post('delete/{item}',[CartController::Class,'delete'])->name('cart.delete');
});

Route::prefix('favorite')->middleware('auth:users')->group(function(){
    Route::get('/',[FavoriteController::class,'index'])->name('favorite.index');
    Route::post('add',[FavoriteController::Class,'add'])->name('favorite.add');
    Route::post('delete/{item}',[FavoriteController::Class,'delete'])->name('favorite.delete');
});


require __DIR__.'/auth.php';

