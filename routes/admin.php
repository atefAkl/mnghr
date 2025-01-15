<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\StoreEntriesController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\ItemCategoriesController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\StoresController;
use App\Http\Controllers\Admin\StoreReportsController;
use App\Http\Controllers\Admin\StoreSettingsController;
use App\Http\Controllers\Admin\StoreReceiptsController;
use App\Http\Controllers\Admin\SettingsController;

// Guest routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
    // Authentication Routes
    Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');

    // Registration Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    // Password Reset Routes
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});

// Authenticated admin routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // Authentication
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin-dashboard');
    Route::get('/operations/log', [HomeController::class, 'log'])->name('operations.log');
    Route::get('/dashboard/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('dashboard/settings/home', [SettingsController::class, 'index'])->name('dashboard-settings-home');

    // Store Entries Routes
    Route::prefix('entries')->group(function () {
        Route::get('/index', [StoreEntriesController::class, 'index'])->name('display-entries-list');
        Route::post('/store', [StoreEntriesController::class, 'store'])->name('save-entry-info');
        Route::get('/edit/{id}', [StoreEntriesController::class, 'edit'])->name('edit-entry-info');
        Route::post('/update', [StoreEntriesController::class, 'update'])->name('update-entry-info');
        Route::get('/destroy/{id}', [StoreEntriesController::class, 'destroy'])->name('destroy-entry-info');
        Route::get('/input/create/{id}', [StoreEntriesController::class, 'createInsert'])->name('add-store-input-entry');
        Route::get('/output/create/{id}', [StoreEntriesController::class, 'createOutput'])->name('add-store-output-entry');
        Route::get('/input/destroy/{id}', [StoreEntriesController::class, 'destroy'])->name('destroy-store-input-entry');
        Route::post('/input/store', [StoreEntriesController::class, 'storeInsert'])->name('save-store-inputs-entry');
        Route::post('/input/update', [StoreEntriesController::class, 'updateInsert'])->name('update-store-inputs-entry');
        Route::post('/get/products/like', [StoreEntriesController::class, 'getProductsLike'])->name('get-products-like-query');
    });

    // Items Routes
    Route::prefix('items')->group(function () {
        Route::get('/home', [ItemsController::class, 'home'])->name('display-items');
        Route::get('/itemsStatistics', [ItemsController::class, 'ItemsStatistics'])->name('display-product-list');
        Route::get('/index', [ItemsController::class, 'index'])->name('display-product-all');
        Route::get('/filter', [ItemsController::class, 'filterProductsAccordingToCategory'])->name('display-product-list-filtered');
        Route::post('/store', [ItemsController::class, 'store'])->name('store-new-product');
        Route::get('/display/{id}', [ItemsController::class, 'display'])->name('view-product-info');
        Route::post('/update', [ItemsController::class, 'update'])->name('update-product-info');
        Route::get('/edit/{id}', [ItemsController::class, 'edit'])->name('edit-product-info');
        Route::get('/destroy/{id}', [ItemsController::class, 'destroy'])->name('destroy-product-info');

        // Categories
        Route::prefix('categories')->group(function () {
            Route::post('/store', [ItemCategoriesController::class, 'store'])->name('store-new-itemCategory');
            Route::get('/edit/{id}', [ItemCategoriesController::class, 'edit'])->name('edit-item-info');
            Route::get('/delete/{id}', [ItemCategoriesController::class, 'destroy'])->name('destroy-item');
        });
    });

    // Branches Routes
    Route::prefix('branches')->group(function () {
        Route::get('/home', [BranchesController::class, 'index'])->name('desplay-branches');
        Route::post('/store', [BranchesController::class, 'store'])->name('store-new-branches');
        Route::post('/update', [BranchesController::class, 'update'])->name('update-branch-info');
        Route::get('/delete/{id}', [BranchesController::class, 'destroy'])->name('destroy-branch');
    });

    // Admins Routes
    Route::prefix('admins')->group(function () {
        Route::get('/all', [AdminsController::class, 'index'])->name('display-admins-list');
        Route::get('/create', [AdminsController::class, 'create'])->name('create-new-admin');
        Route::get('/display/profile/{id}', [AdminsController::class, 'display'])->name('display-admin');
        Route::get('/display/roles/{id}', [AdminsController::class, 'displayRoles'])->name('display-admin-roles');
        Route::get('/display/log/{id}', [AdminsController::class, 'displayLog'])->name('display-admin-log');
        Route::get('/edit/{id}', [AdminsController::class, 'edit'])->name('edit-admin-info');
        Route::get('/destroy/{id}', [AdminsController::class, 'destroy'])->name('destroy-admin');
        Route::post('/store', [AdminsController::class, 'store'])->name('store-admin-info');
        Route::post('/update', [AdminsController::class, 'update'])->name('update-admin-info');
        Route::post('/assign/role/to/admins', [AdminsController::class, 'assignRoles'])->name('assign-role-to-admins');
        Route::get('/assign/role/to/admin/{admin}/{role}', [AdminsController::class, 'assignRole'])->name('assign-role-to-admin');
        Route::get('/dettach/role/from/admin/{a}/{r}', [AdminsController::class, 'dettachRole'])->name('dettach-role-from-admin');
        Route::post('/dettach/roles/from/admins', [AdminsController::class, 'assignRoles'])->name('dettach-roles-from-admin');
    });

    // Stores Routes
    Route::prefix('stores')->group(function () {
        Route::get('/home', [StoresController::class, 'home'])->name('stores-home');
        Route::get('/index', [StoresController::class, 'index'])->name('display-stores-list');
        Route::post('/store', [StoresController::class, 'store'])->name('save-store-info');
        Route::post('/update', [StoresController::class, 'update'])->name('update-store-general-info');
        Route::post('/update/loc', [StoresController::class, 'update_loc'])->name('update-store-location-info');
        Route::post('/update/com', [StoresController::class, 'update_com'])->name('update-store-communication-info');
        Route::get('/edit/{id}', [StoresController::class, 'edit'])->name('edit-store-info');
        Route::get('/destroy/{id}', [StoresController::class, 'destroy'])->name('destroy-store-info');
        Route::get('/reports/home', [StoreReportsController::class, 'reports'])->name('store-reports');
        Route::get('/settings/home', [StoreSettingsController::class, 'settings'])->name('store-settings');
    });

    // Receipts Routes
    Route::prefix('receipts')->group(function () {
        Route::get('/index', [StoreReceiptsController::class, 'index'])->name('display-recepits-list');
        Route::get('/restore/{id}', [StoreReceiptsController::class, 'restore'])->name('restore-receipt-info');
        Route::get('/destroy/{id}', [StoreReceiptsController::class, 'destroy'])->name('forceDelete-receipt-info');
        Route::get('/edit/{id}', [StoreReceiptsController::class, 'edit'])->name('edit-receipt-info');
        Route::post('/update', [StoreReceiptsController::class, 'update'])->name('update-receipt-info');
        Route::post('/store', [StoreReceiptsController::class, 'store'])->name('save-receipt-info');
        Route::get('/archive/{id}', [StoreReceiptsController::class, 'archiveReceipt'])->name('archive-receipt');
        Route::get('/approve/{id}', [StoreReceiptsController::class, 'approveReceipt'])->name('approve-receipt');
        Route::post('/reject/{id}', [StoreReceiptsController::class, 'rejectReceipt'])->name('reject-receipt');
        Route::get('/search', [StoreReceiptsController::class, 'searchReceipt'])->name('search.receipt');
    });
});
