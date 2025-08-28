<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin');
        } elseif (Auth::guard('kasir')->check()) {
            return redirect()->route('kasir');
        } elseif (Auth::guard('member')->check()) {
            return redirect()->route('member');
        }

        return redirect()->route('login'); // kalau belum login
        
        // $userId = Auth::user()->id;  // ambil ID user yg login
        // dd($userId);

        // Tentukan role berdasarkan prefix ID
        // $prefix = substr((string)$userId, 0, 3);

        // $mapRole = [
        //     '101' => 'admin',
        //     '102' => 'kasir',
        //     '103' => 'member',
        // ];

        // $userRole = $mapRole[$prefix] ?? null;

        // Cek apakah role sesuai
        // if ($userRole !== $role) {
        //     abort(403, 'Unauthorized');
        // }

        // return $next($request);

        // if (auth()->guard('admin')->check()) {
        //     return $next($request);
        // }
    }
}
