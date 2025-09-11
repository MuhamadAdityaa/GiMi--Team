<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    kasir,
    Laporan,
};
use Carbon\Carbon;
use App\Http\Requests\LaporanRequest;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::with('kasir', 'member')->get();
        // $laporan = Laporan::all();
        // dd($laporan);

        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        $kasir = Kasir::all();

        return view('laporan.create', compact('kasir'));
    }

    public function store(LaporanRequest $request)
    {
        Laporan::create([
            'kasir_id' => $request->kasir_id,
            'tanggal' => Carbon::now()->toDateString(),
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function showEdit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $kasir = Kasir::all();

        return view('laporan.edit', compact('laporan', 'kasir'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::find($id);

        if ($laporan) {
            $laporan->update([
                'kasir_id' => $request->kasir,
                'tanggal' => Carbon::now()->toDateString(),
            ]);
            return redirect()->route('laporan.index')->with('success', 'Laporan updated successfully.');
        } else {
            return response()->json([
                'message' => 'Laporan not found.'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $laporan = Laporan::find($id);

        if ($laporan) {
            $laporan->delete();
            return redirect()->route('laporan.index')->with('success', 'Laporan deleted successfully.');
        } else {
            return response()->json([
                'message' => 'Laporan not found.'
            ], 404);
        }
    }
}
