<?php

namespace App\Http\Middleware;

use Closure;

class AdminPanelAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$params)
    {
        if ($request->user() != null && $request->user()->status ==1) {
            return $request->user()->authorizeRoles($params) ?
                $next($request) : redirect()->route('login');
        }else{
            return redirect()->route('login');
        }

    }
}
