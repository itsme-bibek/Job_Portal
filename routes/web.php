<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\JobsController;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/jobs',[JobsController::class, 'index'])->name('jobs');

// Now creating the middleware 
Route::group(['prefix'=>'account'],function(){
    // Guest routes 
    Route::group(['middleware'=>'guest'],function(){
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate',[AccountController::class, 'authenticate'])->name('account.authenticate');

    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/profile',[AccountController::class, 'profile'])->name('account.profile');
        Route::put('/update-profile',[AccountController::class, 'updateProfile'])->name('account.updateProfile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::post('/update-profile-pic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
        Route::get('/createJob', [AccountController::class, 'createJob'])->name('account.createJob');
        Route::post('/saveJob', [AccountController::class, 'saveJobs'])->name('account.saveJobs');
        Route::get('/my-jobs', [AccountController::class, 'myJob'])->name('account.myJob');
        Route::get('/editJobs/{jobId}',[AccountController::class, 'editjob'])->name('account.editJobs');
        Route::post('/updateJobs/{jobId}',[AccountController::class, 'updateJobs'])->name('account.updateJobs');
        Route::post('/deleteJobs',[AccountController::class, 'deleteJob'])->name('account.deleteJobs');
        


    });


    // Autheicated routes 
});