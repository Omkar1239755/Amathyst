<?php
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\{AdminController,HobbyController,PersonalityController,AdditionalHobbyController,PersonalTraitController,ActivityController,AssociateController,CompanionController,FaqController,HowItController,DocumentController,GemsController,WithdrawnController,BookingController,TestimonialController,TransactionController};

Route::get('admin/login',[AdminController::class,'index'])->name('admin.login');
Route::post('logincheck',[AdminController::class,'logincheck'])->name('admin.logincheck');
Route::post('admin/login',[AdminController::class,'logout'])->name('admin.logout');

Route::group(['middleware'=>'admin.auth'],function(){ 
    Route::get('admindashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    
    Route::get('hobbies-types',[HobbyController::class,'index'])->name('hobbie.index');
    Route::get('hobbies-create',[HobbyController::class,'create'])->name('hobbie.create');
    Route::post('hobbies-store',[HobbyController::class,'store'])->name('hobbie.store');
    Route::delete('hobbie-delete/{id}',[HobbyController::class,'delete'])->name('hobbie-delete');
    Route::get('hobbie-edit/{id}',[HobbyController::class,'edit'])->name('hobbie.edit');
    Route::post('hobbies-update/{id}',[HobbyController::class,'update'])->name('hobbie.update');
    
    Route::get('additional-hobbies-types',[AdditionalHobbyController::class,'index'])->name('additionalHobbie.index');
    Route::get('additional-hobbies-create',[AdditionalHobbyController::class,'create'])->name('additionalHobbie.create');
    Route::post('additional-hobbies-store',[AdditionalHobbyController::class,'store'])->name('additionalHobbie.store');
    Route::delete('additional-hobbies-delete/{id}',[AdditionalHobbyController::class,'delete'])->name('additionalHobbie.delete');
    Route::get('additional-hobbies-edit/{id}',[AdditionalHobbyController::class,'edit'])->name('additionalHobbie.edit');
    Route::post('additional-hobbies-update/{id}',[AdditionalHobbyController::class,'update'])->name('additionalHobbie.update');
    
    Route::get('personal-trait',[PersonalTraitController::class,'index'])->name('personal-trait.index');
    Route::get('personal-trait-create',[PersonalTraitController::class,'create'])->name('personal-trait.create');
    Route::post('personal-trait-store',[PersonalTraitController::class,'store'])->name('personal-trait.store');
    Route::delete('personal-trait-delete/{id}',[PersonalTraitController::class,'delete'])->name('personal-trait.delete');
    Route::get('personal-trait-edit/{id}',[PersonalTraitController::class,'edit'])->name('personal-trait.edit');
    Route::post('personal-trait-update/{id}',[PersonalTraitController::class,'update'])->name('personal-trait.update');
    
    Route::get('fav-activity',[ActivityController::class,'index'])->name('activtiy.index');
    Route::get('fav-activity-create',[ActivityController::class,'create'])->name('activtiy.create');
    Route::post('fav-activity-store',[ActivityController::class,'store'])->name('activtiy.store');
    Route::delete('fav-activity-delete/{id}',[ActivityController::class,'delete'])->name('activtiy.delete');
    Route::get('fav-activity-edit/{id}',[ActivityController::class,'edit'])->name('activtiy.edit');
    Route::post('fav-activity-update/{id}',[ActivityController::class,'update'])->name('activtiy.update');
    
    Route::get('personality',[PersonalityController::class,'index'])->name('personality.index');
    Route::get('personality-create',[PersonalityController::class,'create'])->name('personality.create');
    Route::post('personality-store',[PersonalityController::class,'store'])->name('personality.store');
    Route::get('personality-edit/{id}',[PersonalityController::class,'edit'])->name('personality.edit');
    Route::post('personality-update/{id}',[PersonalityController::class,'update'])->name('personality.update');
    Route::delete('personality-delete/{id}',[PersonalityController::class,'delete'])->name('personality.delete');
    
    Route::get('associates',[AssociateController::class,'index'])->name('associate.index');
    Route::get('associatecview/{id}',[AssociateController::class,'view'])->name('associate.view');
    Route::get('associatesupdate-status', [AssociateController::class, 'updateStatus'])->name('associate.update-status');
    Route::delete('associate-delete/{id}',[AssociateController::class,'delete'])->name('associate.delete');
    
    Route::get('companions',[CompanionController::class,'index'])->name('companion.index');
    Route::get('companions-view/{id}',[CompanionController::class,'view'])->name('companion.view');
    Route::delete('companions-delete/{id}',[CompanionController::class,'delete'])->name('companion.delete');
    Route::get('update-status', [CompanionController::class, 'updateStatus'])->name('companions.update-status');
    Route::get('featured-update-status', [CompanionController::class, 'featuredupdateStatus'])->name('companions.featured-update-status');
    
    Route::get('faq',[FaqController::class,'index'])->name('faq.index');
    Route::get('faq-create',[FaqController::class,'create'])->name('faq.create');
    Route::post('faq-store',[FaqController::class,'store'])->name('faq.store');
    Route::delete('faq-delete/{id}',[FaqController::class,'delete'])->name('faq.delete');
    Route::get('faq-edit/{id}',[FaqController::class,'edit'])->name('faq.edit');
    Route::post('faq-update/{id}',[FaqController::class,'update'])->name('faq.update');
    
    Route::get('gems-package',[GemsController::class,'GemsPackage'])->name('gemsPackage');
    Route::get('gems-package-create',[GemsController::class,'createGemsPackage'])->name('gemsPackage.create');
    Route::post('gems-package-store',[GemsController::class,'gemsPackageStore'])->name('gemsPackage.store');
    Route::get('gems-package/{id}',[GemsController::class,'edit'])->name('gempackageEdit');
    Route::post('gems-package/{id}',[GemsController::class,'update'])->name('gempackageUpdate');
    Route::get('gems-view',[GemsController::class,'GemsView'])->name('gems');
    Route::post('gems-store',[GemsController::class,'GemsStore'])->name('Gemsstore');
     
    Route::get('howit',[HowItController::class,'index'])->name('howIt.index');
    Route::get('howit-create',[HowItController::class,'create'])->name('howIt.create');
    Route::post('howit-store',[HowItController::class,'store'])->name('howIt.store');
    Route::delete('howit-delete/{id}',[HowItController::class,'delete'])->name('howIt.delete');
    Route::get('howit-edit/{id}',[HowItController::class,'edit'])->name('howIt.edit');
    Route::post('howit-update/{id}',[HowItController::class,'update'])->name('howIt.update');
    
    Route::get('adminuser-document',[DocumentController::class,'index'])->name('admindocument.index');
    Route::get('document-status',[DocumentController::class,'status'])->name('document.status');
    
    Route::get('companion-withdrawn',[WithdrawnController::class,'index'])->name('companion.withdrawn');   
    Route::post('companion-withdrawnstatus',[WithdrawnController::class,'status'])->name('companion.withdrawnstatus');
    
    Route::get('booking-history',[BookingController::class,'index'])->name('booking.index');
    Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial.index');
    Route::get('testimonial-create',[TestimonialController::class,'create'])->name('testimonial.create');
    Route::post('testimonial-store',[TestimonialController::class,'store'])->name('testimonial.store');
    Route::delete('testimonial-delete/{id}',[TestimonialController::class,'delete'])->name('testimonial.delete');
    Route::get('testimonial-edit/{id}',[TestimonialController::class,'edit'])->name('testimonial.edit');
    Route::post('testimonial-update/{id}',[TestimonialController::class,'update'])->name('testimonial.update');
    
     Route::get('transaction',[TransactionController::class,'index'])->name('transaction.index');
});

