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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/service', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

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

//payment success
Route::get('foods/success', [App\Http\Controllers\Food\FoodController::class, 'success'])->name('foods.success');

// reservation
Route::post('foods/booking', [App\Http\Controllers\Food\FoodController::class, 'bookingTable'])->name('foods.booking.table');

//menu
Route::get('foods/menu', [App\Http\Controllers\Food\FoodController::class, 'menu'])->name('foods.menu');

//user
Route::get('users/all-bookings', [App\Http\Controllers\Food\UsersController::class, 'getBookings'])->name('users.bookings');

//orders
Route::get('users/orders', [App\Http\Controllers\Food\UsersController::class, 'getOrders'])->name('users.orders');

//reviews
Route::get('users/write-review', [App\Http\Controllers\Food\UsersController::class, 'viewReview'])->name('users.review.create');
Route::post('users/write-review', [App\Http\Controllers\Food\UsersController::class, 'submitReview'])->name('users.review.store');

//admin
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');



Route::group(["prefix" => "admin", "middleware" => "auth:admin"], function() {
 
//admin dashboard    
Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'adminIndex'])->name('admin.dashboard');
//admins 
Route::get('all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.all');
//link for create admins
Route::get('createAdmin', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmin'])->name('admins.create');

//creating a new admin
Route::post('createAdmin', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmin'])->name('admins.store');

//link for viewing orders
Route::get('allOrders', [App\Http\Controllers\Admins\AdminsController::class, 'allOrders'])->name('orders.all');

});