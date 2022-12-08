<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
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




Route::prefix('administrator')->group(function () {

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/all-users', [AdminController::class, 'allUsers'])->name('admin.allUsers');
        Route::get('/all-salons', [AdminController::class, 'allSalons'])->name('admin.allSalons');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/all-staff', [AdminController::class, 'allStaff'])->name('admin.allStaff');

        Route::get('/active-account/{id}', [AdminController::class, 'activeaccount'])->name('admin.activeaccount');
        Route::get('/block-account/{id}', [AdminController::class, 'blockaccount'])->name('admin.blockaccount');



        Route::get('/categories', [CategoryController::class, 'categories'])->name('admin.categories');
        Route::post('/post-categories', [CategoryController::class, 'post_categories'])->name('admin.post_categories');
        Route::delete('/delete-category/{id}', [CategoryController::class, 'deletecategories'])->name('admin.deletecategories');
        Route::get('/category-active-status/{id}', [CategoryController::class, 'activeCategory'])->name('admin.activeCategory');
        Route::get('/category-block-status/{id}', [CategoryController::class, 'blockCategory'])->name('admin.blockCategory');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit_categories'])->name('admin.edit_categories');
        Route::post('/post-edit-category', [CategoryController::class, 'post_edit_categories'])->name('admin.post_edit_categories');



        Route::get('/countries', [CountryController::class, 'countries'])->name('admin.countries');
        Route::post('/post-countries', [CountryController::class, 'post_countries'])->name('admin.post_countries');
        Route::delete('/delete-countries/{id}', [CountryController::class, 'deletecountries'])->name('admin.deletecountries');

        Route::get('/add-cities/{id}', [CountryController::class, 'add_cities'])->name('admin.add_cities');
        Route::post('/post-cities', [CountryController::class, 'post_cities'])->name('admin.post_cities');

        Route::get('/edit-countries/{id}', [CountryController::class, 'edit_countries'])->name('admin.edit_categories');
        Route::post('/post-edit-countries', [CountryController::class, 'post_edit_countries'])->name('admin.post_edit_countries');

    });
});

Route::get('/email', [AuthenticateController::class, 'email'])->name('user.email');
