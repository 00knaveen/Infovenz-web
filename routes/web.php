<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=>['authcheck']],function(){
Route::get('/', [LoginController::class,'index'])->name('index');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/register',[RegisterController::class,'register'])->name('register');
});
Route::group(['middleware'=>['auth']],function(){
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::post('/add/product',[ProductController::class,'addProduct'])->name('addProduct');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});