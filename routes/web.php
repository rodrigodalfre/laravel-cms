<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

//Site
use App\Http\Controllers\Site\HomeController;

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


Route::get('/', [HomeController::class, 'index']);

Route::prefix('painel')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('painel');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    //Route::get('users', [UserController::class, 'index'])->name('users');
    Route::resource('users', UserController::class);


});

Auth::routes();

