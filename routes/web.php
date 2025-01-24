<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreReceiptsCopyController;
use App\Http\Controllers\Admin\ItemCategoriesController;
use App\Http\Controllers\Admin\StoreReceiptsController;
use App\Http\Controllers\Admin\StoreSettingsController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\StoreEntriesController;
use App\Http\Controllers\Admin\StoreReportsController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\storesController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/pricing', [FrontendController::class, 'pricing'])->name('pricing');

// Admin Routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/operations/log', [HomeController::class, 'log'])->name('operations.log');
    Route::get('/dashboard/home', [HomeController::class, 'index'])->name('admin-dashboard-home');

    /* ========================================================================================================================
        =========== Store Entries Routes Collection ===========================================================================================================
        ======================================================================================================================================== */
    Route::get('/entries/index', [StoreEntriesController::class, 'index'])->name('display-entries-list');
    Route::post('/entries/store', [StoreEntriesController::class, 'store'])->name('save-entry-info');
    Route::get('entries/edit/{id}', [StoreEntriesController::class, 'edit'])->name('edit-entry-info');
    Route::post('entries/update', [StoreEntriesController::class, 'update'])->name('update-entry-info');
    Route::get('entries/destroy/{id}', [StoreEntriesController::class, 'destroy'])->name('destroy-entry-info');
    Route::get('entries/input/create/{id}', [StoreEntriesController::class, 'createInsert'])->name('add-store-input-entry');
    Route::get('entries/output/create/{id}', [StoreEntriesController::class, 'createOutput'])->name('add-store-output-entry');
    Route::get('entries/input/destroy/{id}', [StoreEntriesController::class, 'destroy'])->name('destroy-store-input-entry');
    Route::post('entries/input/store', [StoreEntriesController::class, 'storeInsert'])->name('save-store-inputs-entry');
    Route::post('entries/input/update', [StoreEntriesController::class, 'updateInsert'])->name('update-store-inputs-entry');
    Route::post('entries/get/products/like', [StoreEntriesController::class, 'getProductsLike'])->name('get-products-like-query');

    /* =========================================================================================================================================
        =========== Items Routes Collection ====================================================================================================
        ======================================================================================================================================== */
    Route::get('items/home', [ItemsController::class, 'home'])->name('display-items');
    Route::get('items/itemsStatistics', [ItemsController::class, 'ItemsStatistics'])->name('display-product-list');
    Route::get('items/index', [ItemsController::class, 'index'])->name('display-product-all');
    Route::get('items/filter', [ItemsController::class, 'filterProductsAccordingToCategory'])->name('display-product-list-filtered');
    Route::post('items/store', [ItemsController::class, 'store'])->name('store-new-product');
    Route::get('item/display/{id}', [ItemsController::class, 'display'])->name('view-product-info');
    Route::post('item/update', [ItemsController::class, 'update'])->name('update-product-info');
    Route::get('items/edit/{id}', [ItemsController::class, 'edit'])->name('edit-product-info');
    Route::get('items/destroy/{id}', [ItemsController::class, 'destroy'])->name('destroy-product-info');

    /* ========================================================================================================================================
        =========== Items Categories Routes Collection ========================================================================================
        ======================================================================================================================================== */

    Route::post('items/categories/store', [ItemCategoriesController::class, 'store'])->name('store-new-itemCategory');
    Route::get('items/categories/edit/{id}', [ItemCategoriesController::class, 'edit'])->name('edit-item-info');
    Route::get('items/categories/delete/{id}', [ItemCategoriesController::class, 'destroy'])->name('destroy-item');

    /* ========================================================================================================================================
        =========== Company Branches Routes Collection ========================================================================================
        ======================================================================================================================================== */
    Route::get('/branches/home', [BranchesController::class, 'index'])->name('desplay-branches');
    Route::post('/branches/store', [BranchesController::class, 'store'])->name('store-new-branches');
    Route::post('/branches/update', [BranchesController::class, 'update'])->name('update-branch-info');
    Route::get('/branches/delete/{id}', [BranchesController::class, 'destroy'])->name('destroy-branch');

    /* ========================================================================================================================================
        =========== Admin Routes Collection ===================================================================================================
        ======================================================================================================================================== */
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('admins/all', [AdminsController::class, 'index'])->name('display-admins-list');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('create-new-admin');
    Route::get('admins/display/profile/{id}', [AdminsController::class, 'display'])->name('display-admin');
    Route::get('admins/display/roles/{id}', [AdminsController::class, 'displayRoles'])->name('display-admin-roles');
    Route::get('admins/display/log/{id}', [AdminsController::class, 'displayLog'])->name('display-admin-log');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('edit-admin-info');
    Route::get('admins/destroy/{id}', [AdminsController::class, 'destroy'])->name('destroy-admin');
    Route::post('admins/store/', [AdminsController::class, 'store'])->name('store-admin-info');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('update-admin-info');
    Route::post('assign/role/to/admins', [AdminsController::class, 'assignRoles'])->name('assign-role-to-admins');
    Route::get('assign/role/to/admin/{admin}/{role}', [AdminsController::class, 'assignRole'])->name('assign-role-to-admin');
    Route::get('dettach/role/from/admin/{a}/{r}', [AdminsController::class, 'dettachRole'])->name('dettach-role-from-admin');
    Route::post('dettach/roles/from/admins', [AdminsController::class, 'assignRoles'])->name('dettach-roles-from-admin');

    /* ========================================================================================================================================
        =========== Stores Routes Collection ====================================================================================
        ======================================================================================================================================== */
    Route::get('stores/home', [storesController::class, 'home'])->name('stores-home');
    Route::get('stores/index', [storesController::class, 'index'])->name('display-stores-list');
    Route::post('stores/store', [storesController::class, 'store'])->name('save-store-info');
    Route::post('stores/update', [storesController::class, 'update'])->name('update-store-general-info');
    Route::post('stores/update/loc', [storesController::class, 'update_loc'])->name('update-store-location-info');
    Route::post('stores/update/com', [storesController::class, 'update_com'])->name('update-store-communication-info');
    Route::get('stores/edit/{id}', [storesController::class, 'edit'])->name('edit-store-info');
    Route::get('stores/destroy/{id}', [storesController::class, 'destroy'])->name('destroy-store-info');
    
    Route::get('stores/reports/home', [StoreReportsController::class, 'reports'])->name('store-reports');
    Route::get('stores/settings/home', [StoreSettingsController::class, 'settings'])->name('store-settings');

      /* ========================================================================================================================================
        =========== Store reports Routes Collection =======================================================================================
        ======================================================================================================================================== */
    
<<<<<<< HEAD
    
=======
    // Route::get('stores/report/receipt/input', [StoreReportsController::class, 'index'])->name('reports-receipt');
    Route::get('print/receipt/{id}', [StoreReportsController::class, 'printReceipt'])->name('print-receipt');
>>>>>>> 3ed54f7247175645b44f62a205e78cb2dd5ae563
    Route::get('/print/ReceiptCase', [StoreReportsController::class, 'printReceiptCase'])->name('print-Receipt-Case');
  
    

    
    /* ========================================================================================================================================
        =========== Store Receipt Routes Collection =======================================================================================
        ======================================================================================================================================== */
    Route::get('/receipts/index', [StoreReceiptsController::class, 'index'])->name('display-recepits-list');
    Route::get('receipts/restore/{id}', [StoreReceiptsController::class, 'restore'])->name('restore-receipt-info');
    Route::get('receipts/destroy/{id}', [StoreReceiptsController::class, 'destroy'])->name('forceDelete-receipt-info');
    Route::get('receipts/edit/{id}', [StoreReceiptsController::class, 'edit'])->name('edit-receipt-info');
    Route::post('receipts/update', [StoreReceiptsController::class, 'update'])->name('update-receipt-info');
    Route::post('/receipts/store', [StoreReceiptsController::class, 'store'])->name('save-receipt-info');
    Route::get('receipts/archive/{id}', [StoreReceiptsController::class, 'archiveReceipt'])->name('archive-receipt');
    Route::get('/admin/receipts/approve/{id}', [StoreReceiptsController::class, 'approveReceipt'])->name('approve-receipt');
    Route::post('/admin/receipts/reject/{id}', [StoreReceiptsController::class, 'rejectReceipt'])->name('reject-receipt');
    Route::get('/search-receipts', [StoreReceiptsController::class, 'searchReceipt'])->name('search.receipt');
});
