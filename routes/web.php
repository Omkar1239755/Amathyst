<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DocumentController,
    MyavailabilityController,
    RateController,
    ProfileController,
    AuthController,
    AssociateController,
    ChatController,
    GoogleController
};

    Route::get('clear', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return "Cleared!";
    });

    Route::get('/',[AuthController::class,'index'])->name('index');
    Route::get('login',[AuthController::class,'loginView'])->name('login');
    Route::post('loginCheck',[AuthController::class,'loginCheck'])->name('logincheck');
    Route::get('register',[AuthController::class,'registerView'])->name('register');
    Route::post('Storeregister',[AuthController::class,'Storeregister'])->name('storeregister');
    Route::match(['GET','POST'],'companions-list',[AuthController::class,'companionlist'])->name('home.companion');
    Route::get('view-profile/{id}',[AuthController::class,'viewProfile'])->name('home.viewprofile');
    Route::post('booking-store',[AuthController::class,'bookingstore'])->name('booking.store');
    Route::get('forgot-pss',[AuthController::class,'forgotPass'])->name('forgotpassword');
    Route::post('forgot-pss-check',[AuthController::class,'forgotPassCheck'])->name('forgotpasswordCheck');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');  
    Route::get('webfaq',[AuthController::class,'webfaq'])->name('webfaq');
    
    
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::group(['middleware' =>'auth'],function(){
        Route::get('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('verify-email',[AuthController::class,'verifyEmail'])->name('verify');
        Route::post('verify-otp',[AuthController::class,'verifyOtp'])->name('verifyotp');
        Route::post('resend-otp',[AuthController::class,'resendOtp'])->name('resend.otp');
        Route::get('setting',[AuthController::class, 'Settings'])->name('settings');
        Route::delete('deleteaccount',[AuthController::class, 'deleteaccount'])->name('deleteaccount');
        Route::post('save-setting',[AuthController::class, 'SaveSettings'])->name('Savesettings');
        
        Route::get('signup',[ProfileController::class,'signUp'])->name('signup');
        Route::get('companion-profile',[ProfileController::class,'companionProfile'])->name('companion');
        Route::get('dashboard-profile',[ProfileController::class,'dashboardProfile'])->name('dashboard');
        Route::post('/save-interests', [ProfileController::class, 'saveInterests'])->name('user.save.interests');
        Route::post('/save-hobbie', [ProfileController::class, 'saveHobbie'])->name('user.save.hobbie');
        Route::post('/save-trait', [ProfileController::class, 'saveTrait'])->name('user.save.trait');
        Route::post('/save-activity', [ProfileController::class, 'saveactivity'])->name('user.save.activity');
        Route::post('/complete-companion-profile', [ProfileController::class, 'completeCompanionProfile'])->name('user.companion.complete');
        
        Route::get('edit-companion',[ProfileController::class, 'EditCompanion'])->name('editCompanion');   
        Route::post('edit-companion-store',[ProfileController::class, 'StoreEditCompanion'])->name('storeEditCompanion');
        Route::post('save-images', [ProfileController::class, 'StoreCompanionImage'])->name('images-companion');
        Route::get('companion-booking',[ProfileController::class,'compboooking'])->name('companion.booking');
        Route::get('rating',[ProfileController::class,'rating'])->name('companion.rating');       
        Route::post('booking-status-companion',[ProfileController::class,'bookingstatuss'])->name('bookingstatuscompanion');
        
      
        Route::post('companion-mark-as-complete',[ProfileController::class,'comapnionmark'])->name('companion-mark-as-complete');
        Route::get('earnings',[ProfileController::class,'myearnings'])->name('myearnings');   
        Route::post('myearnings-drawn',[ProfileController::class,'myearningsdrawn'])->name('myearnings-drawn');
        Route::get('notification',[ProfileController::class,'notification'])->name('notification');
       
         
        Route::get('rates',[RateController::class,'index'])->name('rate.index');
        Route::get('rate-create',[RateController::class,'create'])->name('rate.create');
        Route::post('rate-store',[RateController::class,'store'])->name('rate.store');
        Route::get('rate-edit/{id}',[RateController::class,'edit'])->name('rate.edit');
        Route::post('rate-update/{id}',[RateController::class,'update'])->name('rate.update');
    
        Route::get('myavailability',[MyavailabilityController::class,'index'])->name('myavailability.index');
        Route::get('myavailability-status',[MyavailabilityController::class,'allstatus'])->name('myavailability.status');
        Route::post('myavailability-store',[MyavailabilityController::class,'store'])->name('myavailability.store');
        
        Route::get('document',[DocumentController::class,'index'])->name('document.index');
        Route::post('document-store',[DocumentController::class,'store'])->name('document.store');
        Route::get('document-reupload',[DocumentController::class,'reupload'])->name('document.reupload');
        Route::post('document-reuploadstore',[DocumentController::class,'reuploadstore'])->name('document.reuploadstore');
       
        
        // asociate
        Route::get('associate-dashboard',[AssociateController::class,'dashboard'])->name('associatedashboard');
        Route::get('associate-profile',[AssociateController::class,'profile'])->name('associate');
        Route::post('/complete-profile', [AssociateController::class, 'completeProfile'])->name('user.profile.complete');
        Route::get('associate-gems',[AssociateController::class,'gemsassociate'])->name('associategems');
    
    
        Route::get('associate-edit-profile',[AssociateController::class,'editassociate'])->name('Editassociate');
        Route::post('store-associate-profile',[AssociateController::class,'StoreEditassociate'])->name('Storeassociate');
        Route::get('associate-booking',[AssociateController::class,'booking'])->name('associate.booking');
        Route::post('booking-status',[AssociateController::class,'bookingstatus'])->name('booking-status');
        Route::post('associate-mark-as-complete',[AssociateController::class,'markascomplete'])->name('associate-mark-as-complete');
        Route::post('associate-companion-rating',[AssociateController::class,'associateCompanionrating'])->name('associate-companion-rating');
       
        Route::post('buy',[AssociateController::class,'checkout'])->name('purchase');
        Route::get('payment-success', [AssociateController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('payment-cancel', [AssociateController::class, 'paymentCancel'])->name('payment.cancel');
        
        
        // chat
        Route::get('chat', [ChatController::class, 'index'])->name('chat');
        Route::get('/fetch-chat-list', [ChatController::class, 'fetchChatList'])->name('fetch.chat.list');
        Route::post('/chat/send', [ChatController::class, 'sendMessage']);
        Route::get('/chat/messages/{chatId}', [ChatController::class, 'getMessages']);
        Route::get('blocked-users', [ChatController::class, 'blockedUsers'])->name('blocked.users');
    });

