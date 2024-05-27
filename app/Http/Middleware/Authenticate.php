<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // dd($request->httpHost());
        if($request->is('management/*')){
            return $request->expectsJson() ? null : route('management.sign_in');
        }
        return $request->expectsJson() ? null : route('website.user_sign_in');
    }
}
