<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthenticationController::class, 'authenticate'])
        ->name('authenticate');

    Route::get('/register', [AuthenticationController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthenticationController::class, 'create'])
        ->name('create-account');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/logout', [AuthenticationController::class, 'logout'])
        ->name('logout');
});
