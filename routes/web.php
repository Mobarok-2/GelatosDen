<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('foods/food-details/{id}', [App\Http\Controllers\Food\FoodController::class, 'foodDetails'])->name('food.details');

// cart
Route::post('foods/food-details/{id}', [App\Http\Controllers\Food\FoodController::class, 'cart'])->name('food.cart');
Route::get('foods/cart', [App\Http\Controllers\Food\FoodController::class, 'displayCartItem'])->name('food.display.cart');
Route::get('foods/delete-cart/{id}', [App\Http\Controllers\Food\FoodController::class, 'deleteCartItem'])->name('food.delete.cart');

// checkout
Route::post('foods/prepare-checkout', [App\Http\Controllers\Food\FoodController::class, 'prepareCheckout'])->name('prepare.checkout');

// insert user info
Route::get('foods/checkout', [App\Http\Controllers\Food\FoodController::class, 'checkout'])->name('foods.checkout');
Route::post('foods/checkout', [App\Http\Controllers\Food\FoodController::class, 'storeCheckout'])->name('foods.checkout.store');

//payment
Route::get('foods/pay', [App\Http\Controllers\Food\FoodController::class, 'payWithPaypal'])->name('foods.pay');