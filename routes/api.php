<?php

use App\Http\Controllers\Api\ExpertController;
use App\Http\Controllers\Api\SalonController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\OffersController;
use App\Http\Controllers\Api\PackagesController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/profile/{id}', [UserController::class, 'userProfile'])->name('user.userProfile');
Route::post('/forget-password', [UserController::class, 'forget_password'])->name('user.forget_password');
Route::post('/update-password', [UserController::class, 'update_password'])->name('user.update_password');
Route::post('/verify-code', [UserController::class, 'verify_code'])->name('user.verifyCode');

Route::get('/get-all-categories', [UserController::class, 'categories'])->name('user.categories');

Route::prefix('user')->group(function () {

    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');
});



Route::prefix('salon')->group(function () {

    Route::post('/get-staff/{salon_id}', [SalonController::class, 'getStaff'])->name('salon.getStaff');
    Route::post('/register', [SalonController::class, 'register'])->name('salon.register');
    Route::post('/login', [SalonController::class, 'authenticate'])->name('salon.login');
    Route::prefix('offers')->group(function () {
        Route::post('/create', [OffersController::class, 'create'])->name('offers.create');
    });
    Route::prefix('packages')->group(function () {
        Route::post('/create', [PackagesController::class, 'create'])->name('packages.create');
    });
});

Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('user.uploadImage');
Route::get('/uploaded-images/{id}', [ImageController::class, 'getUploadedImage'])->name('user.getUploadedImage');

Route::prefix('staff')->group(function () {

    Route::post('/register', [ExpertController::class, 'register'])->name('staff.register');
    Route::post('/login', [ExpertController::class, 'authenticate'])->name('staff.login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/update', [ExpertController::class, 'update']);
    });
});
