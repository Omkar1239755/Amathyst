<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin', AdminController::class)->names('admin');
});





Route::prefix('admin')->group(function(){
    Route::match(['get', 'post'], '/login', [AdminController::class, 'adminLogin'])->name('admin-login');

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin-dashboard');
    
    // Route::get('/logout',[AdminController::class,'logout']);
    
    //  Route::get('/skill',[SkillController::class,'addSkill']);
    
    // Route::post('/skill/store',[SkillController::class,'storeSkill'])->name('skill-store');
    
    });