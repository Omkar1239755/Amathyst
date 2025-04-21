<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProfileController;





Route::get('/',[IndexController::class,'index'])->name('index');

Route::get('login',[AuthController::class,'loginView'])->name('login');
Route::post('login',[AuthController::class,'loginCheck'])->name('logincheck');

Route::get('register',[AuthController::class,'registerView'])->name('register');
Route::post('register',[AuthController::class,'Storeregister'])->name('storeregister');



Route::get('verify-email',[AuthController::class,'verifyEmail'])->name('verify');
Route::get('sing-up',[AuthController::class,'SingUp'])->name('signup');


Route::get('associate-profile',[ProfileController::class,'associateProfile'])->name('associate');
Route::get('companion-profile',[ProfileController::class,'companionProfile'])->name('companion');
Route::get('dashboard-profile',[ProfileController::class,'dashboardProfile'])->name('dashboard');

