<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Admin\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Customer\Customer;
use App\Http\Controllers\Backend\Blog\BlogController;
use App\Http\Controllers\Backend\TripPage\TripPageController;
use App\Http\Controllers\Backend\Setting\SettingController;

Route::group(['namespace' => 'Backend', 'prefix' => 'admin-login'], function () {
    Route::get('/', [AdminLoginController::class, 'index'])->name('admin-login');
    Route::post('/', [AdminLoginController::class, 'login'])->name('admin-login');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth:admin'], function () {
    Route::any('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('super-admin', '\App\Http\Controllers\Backend\Admin\AdminController');
    Route::post('admin-status-update', [AdminController::class, 'updateAdminStatus'])->name('admin-status-update');
    Route::any('admin-password-change', [AdminController::class, 'passwordChange'])->name('admin-password-change');
    Route::any('admin-logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

    /*
     * ===============blog route section ===========
     */
    Route::resource('admin-blog', "\App\Http\Controllers\Backend\Blog\BlogController");
    Route::any('update-blog-status', [BlogController::class, 'updateBlogStatus'])->name('update-blog-status');

    Route::resource('manage-vehicle-type', "\App\Http\Controllers\Backend\Vehicle\VehicleTypeController");
    Route::resource('manage-vehicle', "\App\Http\Controllers\Backend\Vehicle\VehicleController");
    Route::resource('destination-rate', "\App\Http\Controllers\Backend\Destination\DestinationRateController");
    Route::resource('admin-city', "\App\Http\Controllers\Backend\City\CityController");
    //    =============trip pages ===============
    Route::resource('admin-trip-page', "\App\Http\Controllers\Backend\TripPage\TripPageController");
    Route::any('trip-gallery-image/{criteria?}', [TripPageController::class, 'tripGallery'])->name('trip-gallery-image');
    Route::any('trip-gallery-image-delete/{criteria?}', [TripPageController::class, 'tripGalleryImageDelete'])->name('trip-gallery-image-delete');
    Route::any('trip-gallery-add-images', [TripPageController::class, 'tripGalleryAddImage'])->name('trip-gallery-add-images');
    Route::any('trip-gallery-edit-images/{criteria?}', [TripPageController::class, 'tripGalleryEditImage'])->name('trip-gallery-edit-images');
    Route::any('trip-gallery-edit-images-action/{criteria?}', [TripPageController::class, 'tripGalleryEditImageAction'])->name('trip-gallery-edit-images-action');

//    ===============customer admin list ==========
    Route::any('admin-customer-list', [DashboardController::class, 'customerList'])->name('admin-customer-list');
    Route::any('admin-customer-details/{criteria}', [DashboardController::class, 'customerDetails'])->name('admin-customer-details');
    Route::any('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('ckeditor-image-upload', 'CkEditorImageUpload@index')->name('ckeditor-image-upload');

//    ===============Driver  list ==========
    Route::resource('driver', "\App\Http\Controllers\Backend\Driver\DriverController");

    //  This is for order mgmt page 
    Route::resource('order', "\App\Http\Controllers\Backend\Order\OrderController");
    Route::post('order/update-status', "\App\Http\Controllers\Backend\Order\OrderController@updateStatus")->name('update-order-status');
    Route::post('order/update-payment', "\App\Http\Controllers\Backend\Order\OrderController@updatePaymentStatus")->name('update-order-payment');

});