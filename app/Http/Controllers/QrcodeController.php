<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Member,
    Laporan,
};
use Carbon\Carbon;

class QrcodeController extends Controller
{
    public function index()
    {
        return view('laporan.scan');
    }

    public function create(Request $request)
    {
        $tokenMember = $request->query('token');
        $member = Member::where('kode_qr', $tokenMember)->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Member tidak ditemukan!');
        }

        return redirect()->route('kamera.store', ['member' => $member->id]);
    }

    public function store(Request $request, Member $member)
    {
        // Logika untuk menyimpan laporan
        // Misalnya, membuat laporan baru berdasarkan data member
        // $laporan = new Laporan();
        // $laporan->member_id = $member->id;
        // $laporan->save();

        // dd($request->all(), $member);

        Laporan::create([
            'member_id' => $member->id,
            'tanggal' => Carbon::now()->toDateString(),
        ]);

        // return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');

        return redirect()->route('kamera.scan')->with('success', 'Selamat datang kembali ' . $member->name);
    }
}
