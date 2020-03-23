<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Nếu chưa login mà truy cập vào route được bảo vệ bởi middleware 'auth'
        if (!$request->expectsJson()) {
            if (Route::is('cms.*')) {
                return route('cms.login');
            }
            return route('login');
        }
    }
}
