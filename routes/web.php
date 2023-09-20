<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\adminAccountController;


Route::group(['middleware'=>'userAuth'],function(){
    Route::redirect('','loginpage');

    Route::get('/loginpage', [AuthController::class, 'loginPage'])->name('Auth#login');

    Route::get('/registerpage', [AuthController::class, 'registerPage'])->name('Auth#register');
});

// Route::get('/loginpage', [AuthController::class, 'loginPage'])->name('Auth#login');
// Route::get('/registerpage', [AuthController::class, 'registerPage'])->name('Auth#register');

Route::middleware([
    'auth',
    'verified',
])->group(function () {
    Route::get('dashboard', [Authcontroller::class, 'dashboard'])->name('dashboard');

    Route::group(['middleware'=>'userAuth'], function(){
        Route::prefix('user')->group(function(){
            Route::get('/main', [TaskController::class, 'userMainPage'])->name('user#main');

            Route::get('/delete/{id}', [TaskController::class, 'deleteTask'])->name('user#delete');

            Route::prefix('account')->group(function(){
                //detailpage
                Route::get('/detail/{id}', [AccountController::class, 'detailPage'])->name('user.account.detail');

                //image upload
                Route::post('upload/image', [AccountController::class, 'uploadImage'])->name('user.image.upload');

                //editpage
                Route::get('/edit/{id}', [AccountController::class, 'editPage'])->name('user.account.editpage');

                //edit
                Route::post('edit/data', [AccountController::class, 'editData'])->name('user.account.edit');

                //password change
                Route::get('password/change/{id}', [AccountController::class, 'passwordChangePage'])->name('user.account.password.change.Page');

                //change password
                Route::post('change/password', [AccountController::class, 'changePassword'])->name('user.change.password');
            });

            Route::prefix('ajax')->group(function(){
                Route::get('/create', [AjaxController::class, 'userCreatePage'])->name('Ajax#create');
            });
        });

    });

    Route::group(['middleware'=>'adminAuth'], function(){
        Route::prefix('admin')->group(function(){
            Route::get('/mainPage', [adminAccountController::class, 'mainPage'])->name('admin.mainpage');

            Route::get('/account/{id}', [adminAccountController::class, 'accountPage'])->name('admin.account');

        });

    });
});
