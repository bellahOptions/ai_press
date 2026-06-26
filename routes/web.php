<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstimatorController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\OpsController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;
//Admin routes 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [PageController::class, 'index'])->name('landingPage');
Route::get('/blog', [PageController::class, 'openBlog'])->name('blog');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.send');
Route::get('/quote', [PageController::class, 'quote'])->name('quote');
Route::post('/quote', [PageController::class, 'submitQuote'])->name('quote.send');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

// SEO / crawlability
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');
Route::get('/llms.txt', [SeoController::class, 'llms'])->name('llms');
Route::get('/ai.txt', [SeoController::class, 'aiTxt'])->name('ai-txt');

Route::get('/get/estimate', [EstimatorController::class, 'index'])->name('estimator.index');
//Waitlist
Route::post('/join-waitlist', [WaitlistController::class, 'joinWaitlist'])->name('join.waitlist');
Route::get('/waitlist/success', [WaitlistController::class, 'successpage'])->name('waitlist.success');

//Jobs
Route::prefix('user')->name('jobs.')->middleware(['auth', 'auth'])->group(function(){
    
Route::get('/jobs', [JobsController::class, 'index'])->name('index');
Route::get('/jobs/track', [JobsController::class, 'track'])->name('track');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ─── Operations Management System ────────────────────────────────────────────
Route::prefix('ops')->name('ops.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [OpsController::class, 'dashboard'])->name('dashboard');

    // CRM
    Route::get('/clients', [OpsController::class, 'clients'])->name('clients.index');
    Route::get('/clients/create', [OpsController::class, 'clientCreate'])->name('clients.create');
    Route::get('/clients/{id}/edit', [OpsController::class, 'clientEdit'])->name('clients.edit');
    Route::get('/leads', [OpsController::class, 'leads'])->name('leads.index');

    // ORM — Quotations & Job Orders
    Route::get('/quotations', [OpsController::class, 'quotations'])->name('quotations.index');
    Route::get('/jobs', [OpsController::class, 'jobs'])->name('jobs.index');
    Route::get('/jobs/{id}', [OpsController::class, 'jobShow'])->name('jobs.show');
    Route::get('/production', [OpsController::class, 'production'])->name('production.index');

    // Dispatch
    Route::get('/dispatch', [OpsController::class, 'dispatch'])->name('dispatch.index');

    // ERM — Inventory
    Route::get('/inventory', [OpsController::class, 'inventory'])->name('inventory.index');
    Route::get('/inventory/create', [OpsController::class, 'inventoryCreate'])->name('inventory.create');
    Route::get('/inventory/{id}/adjust', [OpsController::class, 'stockAdjust'])->name('inventory.adjust');
    Route::get('/suppliers', [OpsController::class, 'suppliers'])->name('suppliers.index');
    Route::get('/purchase-orders', [OpsController::class, 'purchaseOrders'])->name('purchase-orders.index');

    // Finance
    Route::get('/invoices', [OpsController::class, 'invoices'])->name('invoices.index');
    Route::get('/invoices/create', [OpsController::class, 'invoiceCreate'])->name('invoices.create');
    Route::get('/invoices/{id}', [OpsController::class, 'invoiceShow'])->name('invoices.show');
    Route::get('/invoices/{id}/pdf', [OpsController::class, 'invoicePdf'])->name('invoices.pdf');
    Route::get('/invoices/{id}/payment', [OpsController::class, 'recordPayment'])->name('invoices.payment');
    Route::get('/expenses', [OpsController::class, 'expenses'])->name('expenses.index');
    Route::get('/payroll', [OpsController::class, 'payroll'])->name('payroll.index');

    // Admin
    Route::get('/staff', [OpsController::class, 'staff'])->name('staff.index');
    Route::get('/reports', [OpsController::class, 'reports'])->name('reports.index');
});
// ─────────────────────────────────────────────────────────────────────────────

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
    
    /* Jobs
    Route::resource('jobs', JobController::class);
    Route::put('jobs/{job}/status', [JobController::class, 'updateStatus'])->name('jobs.status');
    */
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
