<?php

use App\Http\Controllers\Api\ExpertController;
use App\Http\Controllers\Api\SalonController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\OffersController;
use App\Http\Controllers\Api\PackagesController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CountryController;
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

Route::get('/profile', [UserController::class, 'userProfile'])->name('user.userProfile')->middleware('auth:api');

Route::post('/forget-password', [UserController::class, 'forget_password'])->name('user.forget_password');
Route::post('/update-password', [UserController::class, 'update_password'])->name('user.update_password');

Route::post('/verify-code', [UserController::class, 'verify_code'])->name('user.verifyCode');

Route::get('/get-all-categories', [UserController::class, 'categories'])->name('user.categories');

Route::get('/get-all-countries', [UserController::class, 'Api_countries'])->name('user.Api_countries');

Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');
    Route::get('/get-saloon/{id}', [UserController::class, 'get_saloon'])->name('user.get_saloon')->middleware('auth:api');
    Route::get('/get-freques-salons', [UserController::class, 'get_frequ_saloon'])->name('user.get_frequ_saloon')->middleware('auth:api');
});

Route::post('/save-location', [UserController::class, 'Location'])->name('user.Location')->middleware('auth:api');
Route::get('/get-user-location', [UserController::class, 'UserLocation'])->name('user.UserLocation')->middleware('auth:api');
Route::get('/delete-user-location/{id}', [UserController::class, 'DeleteLocation'])->name('user.DeleteLocation')->middleware('auth:api');

Route::post('/save-banner', [BannerController::class, 'SaveBanner'])->name('user.SaveBanner')->middleware('auth:api');
Route::get('/get-banner', [BannerController::class, 'GetBanner'])->name('user.GetBanner')->middleware('auth:api');
Route::get('/delete-banner/{id}', [BannerController::class, 'DeleteBanner'])->name('user.DeleteBanner')->middleware('auth:api');


Route::prefix('salon')->group(function () {
    Route::post('/get-staff/{salon_id}', [SalonController::class, 'getStaff'])->name('salon.getStaff')->middleware('auth:api');
    Route::post('/register', [SalonController::class, 'register'])->name('salon.register');
    Route::post('/login', [SalonController::class, 'authenticate'])->name('salon.login');
    Route::prefix('offers')->group(function () {
        Route::post('/create', [OffersController::class, 'create'])->name('offers.create')->middleware('auth:api');
        Route::get('/by-user', [OffersController::class, 'get'])->name('offers.get')->middleware('auth:api');
        Route::post('/edit', [OffersController::class, 'Edit'])->name('offers.Edit')->middleware('auth:api');
        Route::post('/delete', [OffersController::class, 'Delete'])->name('offers.Delete')->middleware('auth:api');
        Route::post('/active-status', [OffersController::class, 'Active'])->name('offers.Active')->middleware('auth:api');
        Route::post('/block-status', [OffersController::class, 'Block'])->name('offers.Black')->middleware('auth:api');
    });
    Route::prefix('packages')->group(function () {
        Route::post('/create', [PackagesController::class, 'create'])->name('packages.create')->middleware('auth:api');
        Route::get('/by-user', [PackagesController::class, 'get'])->name('packages.get')->middleware('auth:api');
        Route::post('/edit', [PackagesController::class, 'Edit'])->name('packages.Edit')->middleware('auth:api');
        Route::post('/delete', [PackagesController::class, 'Delete'])->name('packages.Delete')->middleware('auth:api');
        Route::post('/active-status', [PackagesController::class, 'Active'])->name('packages.Active')->middleware('auth:api');
        Route::post('/block-status', [PackagesController::class, 'Block'])->name('packages.Black')->middleware('auth:api');
    });
    Route::prefix('services')->group(function () {
        Route::post('/create', [ServicesController::class, 'create'])->name('services.create')->middleware('auth:api');
        Route::get('/by-user', [ServicesController::class, 'get'])->name('services.get')->middleware('auth:api');
        Route::post('/edit', [ServicesController::class, 'Edit'])->name('services.Edit')->middleware('auth:api');
        Route::post('/delete', [ServicesController::class, 'Delete'])->name('services.Delete')->middleware('auth:api');
        Route::post('/active-status', [ServicesController::class, 'Active'])->name('services.Active')->middleware('auth:api');
        Route::post('/block-status', [ServicesController::class, 'Block'])->name('services.Black')->middleware('auth:api');
    });
});

Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('user.uploadImage');
// Route::get('/uploaded-images', [ImageController::class, 'getUploadedImage'])->name('user.getUploadedImage');

Route::prefix('staff')->group(function () {

    Route::post('/register', [ExpertController::class, 'register'])->name('staff.register');
    Route::post('/login', [ExpertController::class, 'authenticate'])->name('staff.login');
    Route::post('/update', [ExpertController::class, 'update'])->middleware('auth:api');
});
