<?php

namespace App\Providers;

use Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once app_path('Http/Helpers/general.php');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // تحقق مما إذا كان المستخدم مصادقًا بالفعل
        if (Auth::check() && request()->is('admin/auth/login', 'admin/register')) {
            // إعادة التوجيه إلى لوحة التحكم
            return redirect('/admin/dashboard');
        }
        Paginator::useBootstrap();
        Schema::defaultStringLength(1000);
    }
}
