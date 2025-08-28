<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkById
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {

        // if ($role === 'kasir' && Auth::guard('kasir')->check()) {
        //     return $next($request);
        // }

        // if ($role === 'admin' && Auth::guard('admin')->check()) {
        //     return $next($request);
        // }

        // if ($role === 'member' && Auth::guard('member')->check()) {
        //     return $next($request);
        // }

        // Kalau ternyata login di guard lain, balikin ke dashboard sesuai guard
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin');
        }
        if (Auth::guard('kasir')->check()) {
            return redirect()->route('kasir.dashboard');
        }
        if (Auth::guard('member')->check()) {
            return redirect()->route('member.dashboard');
        }

        // Kalau bener-bener gak login, baru lempar ke login
        return redirect()->route('login');
    }
}
