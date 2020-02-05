<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSuspended
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
        if (Auth::check() && (bool) Auth::user()['suspended']) {
            Auth::logout();
            return redirect('login')->with(['error_msg' =>  'Your account has been suspended. Contact the admin for more information.'] );
        }
        return $next($request);
    }
}
