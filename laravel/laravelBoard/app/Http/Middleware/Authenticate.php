<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) //유저가 로그인이 안되어 있는 상태에서 진행(자동으로)
    {
        if($request->isRoute)
        
        if (! $request->expectsJson()) {
            return route('goLogin');
        }
    }
}
