<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SupirKondektur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->exists('jwt') ) {
            if ($request->session()->exists('role') ) {
                if ($request->session()->get('role') == 'admin') {
                    return $next($request);
                }
                // return redirect('dashboard');
            }
        }
        return redirect('login');

    }
}
