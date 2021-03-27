<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminlogin
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
        $role = session()->get('account.role');
        if($role == 1){
            return $next($request);
        }
        return redirect('dashboard');
    }
}
