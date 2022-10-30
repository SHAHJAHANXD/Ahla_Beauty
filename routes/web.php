<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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




Route::prefix('user')->group(function () {

    Route::get('/sign-up', [AuthenticateController::class, 'signup'])->name('user.signup');
    Route::post('/register', [AuthenticateController::class, 'register'])->name('user.register');
    Route::get('/reset-password', [AuthenticateController::class, 'reset_password'])->name('user.reset_password');
    Route::post('/verify-reset-password', [AuthenticateController::class, 'verify_reset_password'])->name('user.verify_reset_password');

    Route::get('/login', [AuthenticateController::class, 'login'])->name('user.login');
    Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('user.authenticate');

    Route::get('/forget-password', [AuthenticateController::class, 'forget_password'])->name('user.forget_password');
    Route::post('/send-forget-password', [AuthenticateController::class, 'send_forget_password'])->name('user.send_forget_password');


    Route::get('/resend-code', [AuthenticateController::class, 'ResendCode'])->name('user.resend');
    Route::get('/resend-verification-code', [AuthenticateController::class, 'ResendVerificationCode'])->name('user.ResendVerificationCode');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::post('/verify-code', [AuthenticateController::class, 'verify_code'])->name('user.verifyCode');
        Route::get('/verify-account', [AuthenticateController::class, 'verify_account'])->name('user.verify_account');
        Route::get('/logout', [AuthenticateController::class, 'logout'])->name('user.logout');
    });
});
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth:web'], function () {
    });
});
