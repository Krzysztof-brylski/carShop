<?php

namespace App\Http\Middleware\AccountType;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->accountRole == "admin"){
            return $next($request);
        }
        abort(403);
    }
}
