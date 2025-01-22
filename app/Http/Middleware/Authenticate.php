<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // تحقق مما إذا كان الرابط يخص لوحة التحكم
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('login');
            }
            // توجيه عام لصفحة تسجيل الدخول الافتراضية
            return route('login');
        }
    }
}
