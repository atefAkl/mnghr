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

Route::get('/',                 [IndexController::class, 'index']);
Route::get('home',              [IndexController::class, 'index'])->name('home');
Route::get('/admin/dashboard',  [HomeController::class, 'index'])->name('admin-dashboard');
//Route::get('home/index',   [HomeController::class, 'index'])->name('home.index');


Route::group(
  [
    'namespace'     => 'Admin',
    'prefix'        => 'admin',
    'middleware'    => 'guest:admin'
  ],
  function () {

    // Registration Routes
    Route::get('/register',                               [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register',                              [RegisterController::class, 'register'])->name('register.submit');

    // Password Reset Routes
    Route::get('/forgot-password',                        [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password',                       [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}',                 [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password',                        [PasswordResetController::class, 'resetPassword'])->name('password.update');

  }
);


