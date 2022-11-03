<?php

use App\Http\Controllers\Api\ExpertController;
use App\Http\Controllers\Api\SalonController as ApiSalonController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Salon\SalonController;
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

Route::post('/forget-password', [UserController::class, 'forget_password'])->name('user.forget_password');
Route::post('/update-password', [UserController::class, 'update_password'])->name('user.update_password');
Route::post('/verify-code', [UserController::class, 'verify_code'])->name('user.verifyCode');

Route::get('/get-all-categories', [UserController::class, 'categories'])->name('user.categories');

Route::prefix('user')->group(function () {

    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');

});



Route::prefix('salon')->group(function () {

    Route::post('/register', [ApiSalonController::class, 'register'])->name('salon.register');
    Route::post('/login', [ApiSalonController::class, 'authenticate'])->name('salon.login');

});

