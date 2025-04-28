<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\HobbyController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin', AdminController::class)->names('admin');
});





Route::prefix('adminstrator')->group(function(){
    Route::match(['get', 'post'], '/login', [AdminController::class, 'adminLogin'])->name('admin-login');

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/hobbies-type',[HobbyController::class,'hobbieView'])->name('hobbie-view');
    Route::post('/hobbie-store',[HobbyController::class,'storedata']);
    


    
    // Route::get('/logout',[AdminController::class,'logout']);
    
    //  Route::get('/skill',[SkillController::class,'addSkill']);
    
    // Route::post('/skill/store',[SkillController::class,'storeSkill'])->name('skill-store');
    
    });