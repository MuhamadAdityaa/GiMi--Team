<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return abort(403, 'Unauthorized');
        } elseif (Auth::guard('kasir')->check() && Auth::guard('kasir')->user()->role === 'kasir') {
            return abort(403, 'Unauthorized');
        }

        if (Auth::guard('member')->check() && Auth::guard('kasir')->user()->role === 'member') {
            return $next($request);
        }
        return redirect('login')->with('error', "Kamu tidak memiliki akses ke halaman tersebut.");
    }
}
