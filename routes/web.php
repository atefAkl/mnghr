<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PasswordResetController;

use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\admin\AdminsController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
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


