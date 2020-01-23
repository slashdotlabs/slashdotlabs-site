<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateStaff
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !in_array(Auth::user()->user_type, ['admin', 'employee'])) {
            return redirect(user_type_redirect_path(Auth::user()->user_type));
        }

        return $next($request);
    }
}
