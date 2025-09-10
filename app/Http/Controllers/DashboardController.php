<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Member,
    Kasir,
};

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $member = Member::all();
            dd($member);

            return redirect()->route('dashboard.admin', compact(''));
        } elseif (Auth::guard('kasir')->check()) {
            return redirect()->route('dashboard.kasir');
        } elseif (Auth::guard('member')->check()) {
            return redirect()->route('dashboard.member');
        }

        return redirect()->route('login'); // kalau belum login
    }

    public function admin()
    {
        $member = Member::count();
        $kasir = Kasir::count();
        // dd($member);

        return view('dashboard.admin', compact('member', 'kasir'));
    }

    public function kasir()
    {
        return view('dashboard.kasir');
    }

    public function member()
    {
        return view('dashboard.member');
    }
}
