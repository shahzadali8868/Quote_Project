<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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






Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['guest'])->group(function () {
    Route::any('/login', [AdminController::class,'index'])->name('login');
    Route::any('/register', [AdminController::class,'register'])->name('register');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::any('/change_password', [AdminController::class,'passwordChange'])->name('change_password');
    Route::post('/logout', [AdminController::class,'logout'])->name('logout');
    
});