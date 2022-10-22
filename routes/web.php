<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/services', [UserController::class, 'services'])->name('services');
Route::get('/salon', [UserController::class, 'salon'])->name('salon');
Route::get('/product', [UserController::class, 'product'])->name('product');
Route::get('/book', [UserController::class, 'book'])->name('book');
Route::get('/cart', [UserController::class, 'cart'])->name('cart');
Route::get('/billing-details', [UserController::class, 'billing'])->name('billing');
Route::get('/wallet-and-payments', [UserController::class, 'payments'])->name('payments');
Route::get('/about-us', [UserController::class, 'about'])->name('about');
Route::get('/contact-us', [UserController::class, 'contact'])->name('contact');
