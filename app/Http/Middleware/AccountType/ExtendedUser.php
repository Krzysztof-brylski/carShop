<?php

namespace App\Http\Middleware\AccountType;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtendedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->account_type === "extended"){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
