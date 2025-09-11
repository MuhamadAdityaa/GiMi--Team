<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Member,
    Kasir,
    Laporan,
};
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $member = Member::all();
            dd($member);

            return redirect()->route('admin.dashboard', compact(''));
        } elseif (Auth::guard('kasir')->check()) {
            return redirect()->route('kasir.dashboard');
        } elseif (Auth::guard('member')->check()) {
            return redirect()->route('member.dashboard');
        }

        return redirect()->route('login'); // kalau belum login
    }

    public function admin()
    {
        $member = Member::count();
        $kasir = Kasir::count();
        $laporan = Laporan::whereDate('tanggal', Carbon::now()->toDateString())->get();
        // dd($laporan);

        return view('dashboard.admin', compact('member', 'kasir', 'laporan'));
    }

    public function kasir()
    {
        $member = Member::count();
        $kasir = Kasir::count();
        $laporan = Laporan::whereDate('tanggal', Carbon::now()->toDateString())->get();
        // dd($laporan);

        return view('dashboard.admin', compact('member', 'kasir', 'laporan'));
    }
}
