<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckAddOfferToken
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

        if($request->route() == "/create/offer/standard" and Auth::user()->offerToken > 1){
            return $next($request);
        }
        if($request->route() == "/create/offer/extended" and Auth::user()->extendedOfferToken > 1){
            return $next($request);
        }
        return Redirect::route("offer.select");
    }
}
