<?php


use App\Http\Controllers\Admin\PasswordResetController;

use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\DepartmentLevelController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JobtitlesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\SalariesController;
use App\Http\Controllers\Admin\VaccationsController;
use App\Http\Controllers\Admin\DepartmentController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::middleware('guest:admin')->prefix('admin')->group(function () {
    // Authentication Routes
    // Registration Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');

    // Password Reset Routes
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('admin.password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('admin.password.update');
});

// Authenticated admin routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard',                            [HomeController::class, 'index'])->name('admin-dashboard');
    Route::get('/dashboard/home',                       [HomeController::class, 'index'])->name('admin.dashboard.home');
    Route::get('/operations/log',                       [HomeController::class, 'log'])->name('admin.operations.log');

    Route::get('dashboard/settings/home',               [SettingsController::class, 'index'])->name('dashboard-settings-home');

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
        Route::post('/settings', [AdminsController::class, 'settings'])->name('admins-settings');
    });

    // Roles and Permissions Routes
    Route::prefix('roles')->group(function () {
        Route::get('/all', [RoleController::class, 'index'])->name('display-roles-list');
        Route::get('show/{id}', [RoleController::class, 'show'])->name('show-role-info');
        Route::post('', [RoleController::class, 'store'])->name('store-role-info');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit-roles-info');
        Route::put('update/{id}', [RoleController::class, 'update'])->name('update-roles-info');
        Route::delete('destroy/{id}', [RolePermissionController::class, 'destroy'])->name('destroy-role');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/all', [PermissionController::class, 'index'])->name('display-permissions-list');
        Route::post('store', [PermissionController::class, 'store'])->name('store-permission-info');
        Route::get('show/{id}', [PermissionController::class, 'show'])->name('show-permission-info');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('edit-permission-info');
        Route::put('update/{id}', [PermissionController::class, 'update'])->name('update-permission-info');
        Route::delete('destroy/{id}', [RolePermissionController::class, 'destroy'])->name('destroy-permission');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/operations/log', [HomeController::class, 'log'])->name('operations.log');
    Route::get('/dashboard/home', [HomeController::class, 'index'])->name('admin-dashboard-home');

   
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
    Route::get('logout',                                    [LoginController::class, 'logout'])->name('logout');
    Route::get('admins/all',                                [AdminsController::class, 'index'])->name('display-admins-list');
    Route::get('admins/create',                             [AdminsController::class, 'create'])->name('create-new-admin');
    Route::get('admins/display/profile/{id}',               [AdminsController::class, 'display'])->name('display-admin');
    Route::get('admins/display/roles/{id}',                 [AdminsController::class, 'displayRoles'])->name('display-admin-roles');
    Route::get('admins/display/log/{id}',                   [AdminsController::class, 'displayLog'])->name('display-admin-log');
    Route::get('admins/edit/{id}',                          [AdminsController::class, 'edit'])->name('edit-admin-info');
    Route::get('admins/destroy/{id}',                       [AdminsController::class, 'destroy'])->name('destroy-admin');
    Route::post('admins/store/',                            [AdminsController::class, 'store'])->name('store-admin-info');
    Route::post('admins/update',                            [AdminsController::class, 'update'])->name('update-admin-info');
    Route::post('assign/role/to/admins',                    [AdminsController::class, 'assignRoles'])->name('assign-role-to-admins');
    Route::get('assign/role/to/admin/{admin}/{role}',       [AdminsController::class, 'assignRole'])->name('assign-role-to-admin');
    Route::get('dettach/role/from/admin/{a}/{r}',           [AdminsController::class, 'dettachRole'])->name('dettach-role-from-admin');
    Route::post('dettach/roles/from/admins',                [AdminsController::class, 'assignRoles'])->name('dettach-roles-from-admin');
    Route::post('/assign-role',                             [AdminsController::class, 'assignRole'])->name('assign-role');

  
    // Settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/users-roles',              [SettingsController::class, 'showUsersRoles'])->name('settings.users.roles');
        Route::get('/employees',                [SettingsController::class, 'showEmployees'])->name('settings.employees');
        Route::get('/users-options',            [SettingsController::class, 'showUsersOptions'])->name('settings.users.options');
        Route::get('/profile-settings',         [SettingsController::class, 'showProfileSettings'])->name('settings.profile.settings');
        Route::get('/home',                     [SettingsController::class, 'showGeneralSettings'])->name('display-settings-home');
    });

    Route::prefix('department-level')->group(function () {
        Route::get('list',                     [DepartmentLevelController::class, 'index'])->name('display-department-levels-list');
        Route::post('store/info',               [DepartmentLevelController::class, 'store'])->name('department-levels-store');
        Route::get('edit/info/{id}',            [DepartmentLevelController::class, 'edit'])->name('department-levels-edit');
        Route::put('update/info',               [DepartmentLevelController::class, 'update'])->name('department-levels-update');
        Route::delete('delete/{id}',            [DepartmentLevelController::class, 'destroy'])->name('department-levels-destroy');
    });


    Route::prefix(('profile'))->group(function () {
        Route::get('/settings', [ProfileController::class, 'index'])->name('profile.settings');
    });

    // Employees Routes
    Route::prefix(('employees'))->group(function () {
        Route::get('/list',                     [EmployeeController::class, 'index'])->name('display-employees-list');
        Route::get('/edit/{id}',                [EmployeeController::class, 'edit'])->name('edit-employee-info');
        Route::post('/store',                   [EmployeeController::class, 'store'])->name('store-employee-info');
        Route::put('/update',                   [EmployeeController::class, 'update'])->name('update-employee-info');
        Route::get('/display/{id}',             [EmployeeController::class, 'show'])->name('display-employee-info');
        Route::delete('/delete',                [EmployeeController::class, 'destroy'])->name('delete-employee');
    });

    // Salaries Routes
    Route::prefix(('salaries'))->group(function () {
        Route::get('/groups', [SalariesController::class, 'index'])->name('display-salaries-groups');
    });

    // Vaccations Routes
    Route::prefix(('vaccations'))->group(function () {
        Route::get('/types', [VaccationsController::class, 'index'])->name('display-vaccations-types');
    });

    // Jobtitles Routes
    Route::prefix(('jobtitles'))->group(function () {
        Route::get('/list',                     [JobtitlesController::class, 'index'])->name('display-jobtitles-list');
        Route::post('/store/info',              [JobtitlesController::class, 'store'])->name('store-jobtitle-info');
        Route::get('/edit/{id}',                [JobtitlesController::class, 'edit'])->name('edit-jobtitle-info');
        Route::put('/update',                   [JobtitlesController::class, 'update'])->name('update-jobtitle-info');
        Route::delete('/delete/{id}',           [JobtitlesController::class, 'destroy'])->name('delete-jobtitle');
    });

    // Departments Routes
    Route::prefix(('departments'))->group(function () {
        Route::get('/list',                     [DepartmentController::class, 'index'])->name('display-departments-list');
        Route::get('/create',                   [DepartmentController::class, 'create'])->name('create-new-department');
        Route::post('/store',                   [DepartmentController::class, 'store'])->name('store-department-info');
        Route::get('/edit/{id}',                [DepartmentController::class, 'edit'])->name('edit-department-info');
        Route::put('/update/{id}',              [DepartmentController::class, 'update'])->name('update-department-info');
        Route::delete('/delete/{id}',           [DepartmentController::class, 'destroy'])->name('delete-department');
    });

});

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
