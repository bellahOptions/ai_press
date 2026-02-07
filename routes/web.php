<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstimatorController;
use Illuminate\Support\Facades\Route;
//Admin routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [PageController::class, 'index'])->name('landingPage');

Route::get('/get/estimate', [EstimatorController::class, 'index'])->name('estimator.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin
// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Users
    Route::resource('users', UserController::class);
    
    // Jobs
    Route::resource('jobs', JobController::class);
    Route::put('jobs/{job}/status', [JobController::class, 'updateStatus'])->name('jobs.status');
    
    // Services & Pricing
    Route::resource('services', ServiceController::class);
    Route::put('services/{service}/update-price', [ServiceController::class, 'updatePrice'])->name('services.update-price');
    
    // Blog
    Route::resource('blog', BlogController::class);
    
    // Coupons
    Route::resource('coupons', CouponController::class);
    
    // Roles & Permissions (Super Admin only)
    Route::middleware(['role:Super Admin'])->group(function () {
        Route::resource('roles', RoleController::class);
        Route::get('settings', function () {
            return view('admin.settings');
        })->name('settings');
    });
    
    // Profile
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');
});
require __DIR__.'/auth.php';
