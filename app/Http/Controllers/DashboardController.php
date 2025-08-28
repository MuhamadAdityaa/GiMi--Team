<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.admin');
        } elseif (Auth::guard('kasir')->check()) {
            return redirect()->route('dashboard.kasir');
        } elseif (Auth::guard('member')->check()) {
            return redirect()->route('dashboard.member');
        }

        return redirect()->route('login'); // kalau belum login
    }

    public function admin(){
        return view('dashboard.admin');
    }

    public function kasir(){
        return view('dashboard.kasir');
    }
}
