<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

class MustBeOwner
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
        $owned_clubs = $request->user()->owned_clubs;
        $request_club = $request->club;

        if ($owned_clubs->contains($request_club)) {
            return $next($request);
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
