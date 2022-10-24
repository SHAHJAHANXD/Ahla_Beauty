<?php

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
Route::prefix('user')->group(function () {

    Route::post('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/login', [UserController::class, 'authenticate'])->name('user.login');
    Route::post('/verify-code', [UserController::class, 'verify_code'])->name('user.verifyCode');
    Route::post('/forget-password', [UserController::class, 'forget_password'])->name('user.forget_password');
    Route::post('/update-password', [UserController::class, 'update_password'])->name('user.update_password');

});

