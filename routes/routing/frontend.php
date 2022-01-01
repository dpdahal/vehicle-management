<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Frontend\UserLoginController;
use App\Http\Controllers\Frontend\UserRegisterController;
use App\Http\Controllers\Frontend\UserController;

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    Route::get('blog/{criteria?}', [ApplicationController::class, 'blog'])->name('blog');
    Route::any('/blog-comment', [ApplicationController::class,'blogComment'])->name('blog-comment');



    Route::any('test', function () {
        echo "est";
    });

    Route::get('login', [UserLoginController::class, 'index'])->name('login');
    Route::post('login', [UserLoginController::class, 'store'])->name('login');
    Route::get('/register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('/register', [UserRegisterController::class, 'store'])->name('register');
    Route::any('/user/verify/{token}', [UserLoginController::class, 'verificationUser'])->name('user-verification');
    Route::any('/forgot-password', [UserLoginController::class, 'forgotPassword'])->name('forgot-password');
    Route::any('/password-reset', [UserLoginController::class, 'passwordReset'])->name('password-reset');
    Route::get('login/{provider}/', [UserLoginController::class, 'redirect'])->name('login.redirect');
    Route::get('login/{provider}/callback/', [UserLoginController::class, 'Callback'])->name('login.callback');

    Route::group(['prefix' => 'user', 'middleware' => 'auth:web'], function () {
        Route::any('/', [UserController::class, 'index'])->name('users');
        Route::any('logout', [UserLoginController::class, 'logout'])->name('logout');
    });
});


