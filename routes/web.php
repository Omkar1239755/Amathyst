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
Route::post('verify-otp',[AuthController::class,'verifyOtp'])->name('verifyotp');

// Route::get('login',[AuthController::class,'login'])->name('login');
// Route::post('login',[AuthController::class,'loginStore'])->name('logincheck');

Route::get('signup',[ProfileController::class,'signUp'])->name('signup');

Route::get('associate-profile',[ProfileController::class,'associateProfile'])->name('associate');

// Route::get('update-user-associate',[ProfileController::class,'updateProfileAssociate'])->name('updateassociate');


Route::get('companion-profile',[ProfileController::class,'companionProfile'])->name('companion');

// Route::get('update-user-associate',[ProfileController::class,'updateProfileAssociate'])->name('updateassociate');

Route::get('dashboard-profile',[ProfileController::class,'dashboardProfile'])->name('dashboard');

