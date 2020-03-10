<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = ['customer'];

        if (!in_array(Auth::user()->role, $roles) || !isset(Auth::user()->id))  {
            return redirect()->route('user.logout');
        }
        return $next($request);
    }
}
