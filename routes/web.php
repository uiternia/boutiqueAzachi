<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ContactController;
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
Route::get('shop/{shop}',[ProductController::class,'shop'])->name('products.shop');
});

Route::prefix('cart')->middleware('auth:users')->group(function(){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::post('add',[CartController::Class,'add'])->name('cart.add');
    Route::post('delete/{item}',[CartController::Class,'delete'])->name('cart.delete');
    Route::get('checkout',[CartController::Class,'checkout'])->name('cart.checkout');
    Route::get('success',[CartController::class,'success'])->name('cart.success');
    Route::get('cancel',[CartController::class,'cancel'])->name('cart.cancel');
});

Route::prefix('contact')->middleware('auth:users')->group(function(){
    Route::get('/',[ContactController::class,'index'])->name('contact.index');
    Route::post('thanks',[ContactController::Class,'thanks'])->name('contacts.thanks');
});

// Route::prefix('favorite')->middleware('auth:users')->group(function(){
//     Route::get('/',[FavoriteController::class,'view'])->name('favorite.view');
//     Route::post('add',[FavoriteController::Class,'add'])->name('favorite.add');
//     Route::post('delete/{product}',[FavoriteController::Class,'delete'])->name('favorite.delete');
// });



require __DIR__.'/auth.php';

