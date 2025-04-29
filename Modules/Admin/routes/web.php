<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\HobbyController;
use Modules\Admin\Http\Controllers\AdditionalHobbyController;
use Modules\Admin\Http\Controllers\PersonalTraitController;

use Modules\Admin\Http\Controllers\ActivityController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin', AdminController::class)->names('admin');
});





Route::prefix('adminstrator')->group(function(){
    Route::match(['get', 'post'], '/login', [AdminController::class, 'adminLogin'])->name('admin-login');

    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/hobbies-type',[HobbyController::class,'hobbieView'])->name('hobbie-view');
    Route::post('/hobbie-store',[HobbyController::class,'storedata']);

    Route::get('/additional-hobbie',[AdditionalHobbyController::class,'additionalHobbieView'])->name('additionalHobbie');
    Route::post('/additional-hobbie-store',[AdditionalHobbyController::class,'additionalHobbieViewStore']);

    Route::get('/personal-traits',[PersonalTraitController::class,'personaltraitsView'])->name('personaltrait');
    Route::post('/personal-traits-store',[PersonalTraitController::class,'personaltraitsViewStore']);

    Route::get('/activity',[ActivityController::class,'activityView'])->name('activity');
    Route::post('/activity-store',[ActivityController::class,'activityViewStore']);

    
    // Route::get('/logout',[AdminController::class,'logout']);
    
    //  Route::get('/skill',[SkillController::class,'addSkill']);
    
    // Route::post('/skill/store',[SkillController::class,'storeSkill'])->name('skill-store');
    
    });