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

    public function filtering(Request $request)
    {
        $periode = $request->get('periode', 'today'); // default: today

        $query = Laporan::query();

        switch ($periode) {
            case 'today':
                $query->whereDate('tanggal', Carbon::today());
                $member = Member::count();
                $kasir = Kasir::count();
                $laporan = Laporan::whereDate('tanggal', Carbon::now()->toDateString())->get();
                break;

            case 'yesterday':
                $query->whereDate('tanggal', Carbon::yesterday());
                $member = Member::count();
                $kasir = Kasir::count();
                $laporan = Laporan::whereDate('tanggal', Carbon::yesterday()->toDateString())->get();
                break;

            case '7days':
                $query->whereDate('tanggal', '>=', Carbon::now()->subDays(7));
                $member = Member::count();
                $kasir = Kasir::count();
                $laporan = Laporan::whereDate('tanggal', '>=', Carbon::now()->subDays(7))->get();
                break;

            case '30days':
                $query->whereDate('tanggal', '>=', Carbon::now()->subDays(30));
                $member = Member::count();
                $kasir = Kasir::count();
                $laporan = Laporan::whereDate('tanggal', '>=', Carbon::now()->subDays(30))->get();
                break;

            default:
                // default ambil hari ini
                $query->whereDate('tanggal', Carbon::today());
        }

        $laporans = $query->get();

        return view('dashboard.admin', compact('laporans', 'periode', 'member', 'kasir', 'laporan'));
    }
}
