<?php

use App\Http\Controllers\Web\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\storesController;
use App\Http\Controllers\Admin\InputReceiptsController;
use App\Http\Controllers\Admin\OutputReceiptsController;
use App\Http\Controllers\admin\AdminsController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\ItemCategoriesController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;





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


Route::get('/',            [IndexController::class, 'index']);
Route::get('home',         [IndexController::class, 'index'])->name('home');


Route::group(
  [
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'auth:admin'
  ],
  function () {
    Route::get('dashboard',                 [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('operations/log',            [HomeController::class, 'log'])->name('operations.log');
    Route::get('dashboard/home',            [HomeController::class, 'index'])->name('home.index');
    Route::get('logout',                    [LoginController::class, 'logout'])->name('logout');
    // Route::get('/auth/login',               [LoginController::class, 'index'])->name('admin.auth.login');
    // Route::post('/login',                   [LoginController::class, 'login'])->name('admin.login');
    // Route::get('/auth/zibala',              [LoginController::class, 'login'])->name('login');

    //=====================================================================================================================================================================
    //======================================================= General Stats ==========================================================================================
    //=====================================================================================================================================================================
    Route::get('home/index',                [HomeController::class, 'index'])->name('home.index');
  }
);

Route::group(
  [
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'guest:admin'
  ],
  function () {
    // Route::get('logout',                                    [LoginController::class, 'logout']);
    // Route::get('logout',                                    [LoginController::class, 'logout']);
    Route::get('/auth/login',                                       [LoginController::class, 'index'])->name('login');
    Route::post('login',                                            [LoginController::class, 'login'])->name('admin.login');
  }
);

Route::group(
  [
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'auth:admin'
  ],
  function () {

    Route::get('logout',                                [LoginController::class, 'logout'])->name('logout');
    Route::get('home/index',                            [HomeController::class, 'index'])->name('home.index');
    Route::get('admins/all',                            [AdminsController::class, 'index'])->name('display-admins-list');
    Route::get('admins/create',                         [AdminsController::class, 'create'])->name('create-new-admin');
    Route::get('admins/display/profile/{id}',           [AdminsController::class, 'display'])->name('display-admin');
    Route::get('admins/display/roles/{id}',             [AdminsController::class, 'displayRoles'])->name('display-admin-roles');
    Route::get('admins/display/log/{id}',               [AdminsController::class, 'displayLog'])->name('display-admin-log');
    Route::get('admins/edit/{id}',                      [AdminsController::class, 'edit'])->name('edit-admin-info');
    Route::get('admins/destroy/{id}',                   [AdminsController::class, 'destroy'])->name('destroy-admin');
    Route::post('admins/store/',                        [AdminsController::class, 'store'])->name('store-admin-info');
    Route::post('admins/update',                        [AdminsController::class, 'update'])->name('update-admin-info');
    Route::post('assign/role/to/admins',                [AdminsController::class, 'assignRoles'])->name('assign-role-to-admins');
    Route::get('assign/role/to/admin/{admin}/{role}',   [AdminsController::class, 'assignRole'])->name('assign-role-to-admin');
    Route::get('dettach/role/from/admin/{a}/{r}',       [AdminsController::class, 'dettachRole'])->name('dettach-role-from-admin');
    Route::post('dettach/roles/from/admins',            [AdminsController::class, 'assignRoles'])->name('dettach-roles-from-admin');

    /* ========================================================================================================================================
        =========== Stores Routes Collection ===========================================================================================================
        ======================================================================================================================================== */
    Route::get('stores/home',                           [storesController::class, 'home'])->name('stores-home');
    Route::get('stores/index',                          [storesController::class, 'index'])->name('display-stores-list');
    Route::post('stores/store',                         [storesController::class, 'store'])->name('save-store-info');
    Route::post('stores/update',                        [storesController::class, 'update'])->name('update-store-general-info');
    Route::post('stores/update/loc',                    [storesController::class, 'update_loc'])->name('update-store-location-info');
    Route::post('stores/update/com',                    [storesController::class, 'update_com'])->name('update-store-communication-info');
    Route::get('stores/edit/{id}',                      [storesController::class, 'edit'])->name('edit-store-info');
    Route::get('stores/destroy/{id}',                   [storesController::class, 'destroy'])->name('destroy-store-info');


      /* ========================================================================================================================================
      =========== Store Receipt Routes Collection ===========================================================================================================
      ======================================================================================================================================== */
      Route::get('/receipts/input/home',                      [InputReceiptsController::class, 'index'])->name('display-inputReceipts-list');
      Route::get('/receipts/input/inProgressReceipts  ',      [InputReceiptsController::class, 'inProgressReceipts'])->name('display-input-inProgressReceipts');
      Route::get('/receipts/input/approvedReceipts  ',        [InputReceiptsController::class, 'approvedReceipts'])->name('display-input-approvedReceipts');
      Route::get('/receipts/input/archivedReceipts  ',        [InputReceiptsController::class, 'archivedReceipts'])->name('display-input-archivedReceipts');
      Route::get('receipts/input/restore/{id}',               [InputReceiptsController::class, 'restore'])->name('restore-input-receipt-info');
      Route::get('receipts/input/forceDelete/{id}',           [InputReceiptsController::class, 'forceDelete'])->name('forceDelete-input-receipt-info');
      Route::get('/receipts/output/home',                     [OutputReceiptsController::class, 'index'])->name('display-outputReceipts-list');
      Route::get('/receipts/output/inProgressReceipts  ',     [OutputReceiptsController::class, 'inProgressReceipts'])->name('receipts.output.in-progress');
      Route::get('/receipts/output/approvedReceipts  ',       [OutputReceiptsController::class, 'approvedReceipts'])->name('receipts.output.approved');
      Route::get('/receipts/output/archivedReceipts  ',       [OutputReceiptsController::class, 'archivedReceipts'])->name('receipts.output.archived');
      Route::get('receipts/output/restore/{id}',              [OutputReceiptsController::class, 'restore'])->name('restore-output-receipt-info');
      Route::get('receipts/output/forceDelete/{id}',          [OutputReceiptsController::class, 'forceDelete'])->name('forceDelete-output-receipt-info');
      Route::get('receipts/edit/{id}',                        [InputReceiptsController::class, 'edit'])->name('edit-receipt-info');
      Route::post('receipts/update',                          [InputReceiptsController::class, 'update'])->name('update-receipt-info');
      Route::post('/receipts/store',                          [InputReceiptsController::class, 'store'])->name('save-receipt-info');
      Route::get('receipts/destroy/{id}',                     [InputReceiptsController::class, 'destroy'])->name('destroy-receipt-info');

      
   // Route::get('receipts/filter/{val1}/{val2}/{val3}/{val4}',           [InputReceiptsController::class, 'loadData'])->name('load.data');


    /* ========================================================================================================================================
      =========== Items Routes Collection ===========================================================================================================
      ======================================================================================================================================== */
    Route::get('items/home',                            [ItemsController::class, 'home'])->name('display-items');
    Route::get('items/itemsStatistics',                 [ItemsController::class, 'ItemsStatistics'])->name('display-product-list');
    Route::get('items/index',                           [ItemsController::class, 'index'])->name('display-product-all');
    Route::get('items/filter',                          [ItemsController::class, 'filterProductsAccordingToCategory'])->name('display-product-list-filtered');
    Route::post('items/store',                          [ItemsController::class, 'store'])->name('store-new-product');
    Route::get('item/display/{id}',                     [ItemsController::class, 'display'])->name('view-product-info');
    Route::post('item/update',                          [ItemsController::class, 'update'])->name('update-product-info');
    Route::get('items/edit/{id}',                       [ItemsController::class, 'edit'])->name('edit-product-info');
    Route::get('items/destroy/{id}',                    [ItemsController::class, 'destroy'])->name('destroy-product-info');

    /* ========================================================================================================================================
      =========== Items Categories Routes Collection ===========================================================================================================
      ======================================================================================================================================== */

    Route::post('items/categories/store',               [ItemCategoriesController::class, 'store'])->name('store-new-itemCategory');
    Route::get('items/categories/edit/{id}',            [ItemCategoriesController::class, 'edit'])->name('edit-item-info');
    Route::get('items/categories/delete/{id}',          [ItemCategoriesController::class, 'destroy'])->name('destroy-item');

    /* ========================================================================================================================================
      =========== Company Branches Routes Collection ===========================================================================================================
      ======================================================================================================================================== */
    Route::get('/branches/home',                        [BranchesController::class, 'index'])->name('desplay-branches');
    Route::post('/branches/store',                      [BranchesController::class, 'store'])->name('store-new-branches');
    Route::post('/branches/update',                     [BranchesController::class, 'update'])->name('update-branch-info');
    Route::get('/branches/delete/{id}',                 [BranchesController::class, 'destroy'])->name('destroy-branch');


      
  }
);
