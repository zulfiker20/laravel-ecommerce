<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;



Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
// Vendor Group Routes
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'logout'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::post('/vendor/profile/update', [VendorController::class, 'ProfileUpdate'])->name('vendor.profile.update');
    Route::get('/vendor/change/password', [VendorController::class, 'ChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'UpdatePassword'])->name('vendor.update.password');
});

Route::get('/vendor/login', [VendorController::class, 'login'])->name('vendor.login');

use App\Http\Controllers\Front\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Group Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'ProfileUpdate'])->name('admin.profile.update');
    // password change
    Route::get('/admin/change/password', [AdminController::class, 'ChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'UpdatePassword'])->name('admin.update.password');
});

use App\Http\Controllers\UserDashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    // user logout  
    Route::get('/user/logout', [UserDashboardController::class, 'userlogout'])->name('user.logout');
    Route::get('/user/profile', [UserDashboardController::class, 'userprofile'])->name('user.profile');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



use App\Http\Controllers\Admin\CategoryController as AdminCategory;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/category', [AdminCategory::class, 'index'])
        ->name('category.index');

    Route::get('/category/create', [AdminCategory::class, 'create'])
        ->name('category.create');

    Route::post('/category/store', [AdminCategory::class, 'store'])
        ->name('category.store');

    Route::get('/category/edit/{id}', [AdminCategory::class, 'edit'])
        ->name('category.edit');

    Route::post('/category/update/{id}', [AdminCategory::class, 'update'])
        ->name('category.update');

    Route::delete('/category/delete/{id}', [AdminCategory::class, 'destroy'])
        ->name('category.delete');
});

use App\Http\Controllers\Admin\SubcategoryController as AdminSubcategory;

Route::prefix('admin')->name('admin.')->group(function () {

    // Subcategory CRUD

    Route::get('subcategory', [AdminSubcategory::class, 'index'])
        ->name('subcategory.index');

    Route::get('subcategory/create', [AdminSubcategory::class, 'create'])
        ->name('subcategory.create');

    Route::post('subcategory/store', [AdminSubcategory::class, 'store'])
        ->name('subcategory.store');

    Route::get('subcategory/edit/{id}', [AdminSubcategory::class, 'edit'])
        ->name('subcategory.edit');

    Route::post('subcategory/update/{id}', [AdminSubcategory::class, 'update'])
        ->name('subcategory.update');

    Route::delete('subcategory/delete/{id}', [AdminSubcategory::class, 'destroy'])
        ->name('subcategory.delete');
});



use App\Http\Controllers\Admin\AdminBrandController;

Route::get('admin/brands', [AdminBrandController::class, 'index'])
    ->name('admin.brand.index');

Route::get('admin/brands/create', [AdminBrandController::class, 'create'])
    ->name('admin.brand.create');

Route::post('admin/brands/store', [AdminBrandController::class, 'store'])
    ->name('admin.brand.store');

Route::get('admin/brands/edit/{id}', [AdminBrandController::class, 'edit'])
    ->name('admin.brand.edit');

Route::post('admin/brands/update/{id}', [AdminBrandController::class, 'update'])
    ->name('admin.brand.update');

Route::delete('admin/brands/delete/{id}', [AdminBrandController::class, 'destroy'])
    ->name('admin.brand.delete');

use App\Http\Controllers\Admin\AdminBannerController;

Route::get('admin/banners', [AdminBannerController::class, 'index'])
    ->name('admin.banner.index');

Route::get('admin/banners/create', [AdminBannerController::class, 'create'])
    ->name('admin.banner.create');

Route::post('admin/banners/store', [AdminBannerController::class, 'store'])
    ->name('admin.banner.store');

Route::get('admin/banners/edit/{id}', [AdminBannerController::class, 'edit'])
    ->name('admin.banner.edit');

Route::post('admin/banners/update/{id}', [AdminBannerController::class, 'update'])
    ->name('admin.banner.update');

Route::delete('admin/banners/delete/{id}', [AdminBannerController::class, 'destroy'])
    ->name('admin.banner.delete');

use App\Http\Controllers\Admin\AdminSliderController;

Route::get('admin/slider', [AdminSliderController::class, 'index'])
    ->name('admin.slider.index');

Route::get('admin/slider/create', [AdminSliderController::class, 'create'])
    ->name('admin.slider.create');

Route::post('admin/slider/store', [AdminSliderController::class, 'store'])
    ->name('admin.slider.store');

Route::get('admin/slider/edit/{id}', [AdminSliderController::class, 'edit'])
    ->name('admin.slider.edit');

Route::post('admin/slider/update/{id}', [AdminSliderController::class, 'update'])
    ->name('admin.slider.update');

Route::delete('admin/slider/delete/{id}', [AdminSliderController::class, 'destroy'])
    ->name('admin.slider.delete');



// Coupon CRUD Routes
use App\Http\Controllers\Admin\AdminCouponController;

Route::get('admin/coupon', [AdminCouponController::class, 'index'])
    ->name('admin.coupon.index');

Route::get('admin/coupon/create', [AdminCouponController::class, 'create'])
    ->name('admin.coupon.create');

Route::post('admin/coupon/store', [AdminCouponController::class, 'store'])
    ->name('admin.coupon.store');

Route::get('admin/coupon/edit/{id}', [AdminCouponController::class, 'edit'])
    ->name('admin.coupon.edit');

Route::post('admin/coupon/update/{id}', [AdminCouponController::class, 'update'])
    ->name('admin.coupon.update');

Route::delete('admin/coupon/delete/{id}', [AdminCouponController::class, 'destroy'])
    ->name('admin.coupon.delete');


use App\Http\Controllers\Admin\AdminRoleController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Permission CRUD
    Route::get('/permission', [AdminRoleController::class, 'index'])
        ->name('permission.index');

    Route::get('/permission/create', [AdminRoleController::class, 'create'])
        ->name('permission.create');

    Route::post('/permission/store', [AdminRoleController::class, 'store'])
        ->name('permission.store');

    Route::get('/permission/edit/{id}', [AdminRoleController::class, 'edit'])
        ->name('permission.edit');

    Route::post('/permission/update/{id}', [AdminRoleController::class, 'update'])
        ->name('permission.update');

    Route::delete('/permission/delete/{id}', [AdminRoleController::class, 'destroy'])
        ->name('permission.delete');


    Route::get('/role', [AdminRoleController::class, 'roleIndex'])
        ->name('role.index');

    Route::get('/role/create', [AdminRoleController::class, 'roleCreate'])
        ->name('role.create');

    Route::post('/role/store', [AdminRoleController::class, 'roleStore'])
        ->name('role.store');

    Route::get('/role/edit/{id}', [AdminRoleController::class, 'roleEdit'])
        ->name('role.edit');

    Route::post('/role/update/{id}', [AdminRoleController::class, 'roleUpdate'])
        ->name('role.update');

    Route::delete('/role/delete/{id}', [AdminRoleController::class, 'roleDestroy'])
        ->name('role.delete');
});
