<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;


Route::get('/',[HomeController::class, 'index'])->name('home');

// Now creating the middleware 
Route::group(['account'],function(){
    // Guest routes 
    Route::group(['middleware'=>'guest'],function(){
        Route::get('/account/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/account/authenticate',[AccountController::class, 'authenticate'])->name('account.authenticate');

    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/account/profile',[AccountController::class, 'profile'])->name('account.profile');
        Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');

    });


    // Autheicated routes 
});