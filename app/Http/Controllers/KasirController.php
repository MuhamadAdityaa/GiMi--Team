<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KasirRequest;
use App\Models\Kasir;
use Illuminate\Support\Facades\Crypt;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::all();

        return view('kasir.index', compact('kasirs'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(KasirRequest $request)
    {
        $role = 'kasir';

        Kasir::create([
            'name' => $request->nama,
            'role' => $role,
            'username' => $request->username,
            'no_telp' => $request->nomer_telp,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('kasir.index')->with('succes', 'Data kasir berhasil ditambahkan');
    }

    public function showEdit($id)
    {
        $value = Kasir::find($id);

        return view('kasir.edit', compact('value'));
    }

    public function update(Request $request, $id)
    {

        $kasir = Kasir::find($id);

        if ($kasir) {
            $kasir->update([
                'name' => $request->nama,
                'username' => $request->username,
                'no_telp' => $request->nomer_telp,
            ]);
            return redirect()->route('kasir.index')->with('success', 'Kasir updated successfully.');
        } else {
            return response()->json([
                'message' => 'Kasir not found.'
            ], 404);
        }
    }

    public function passwordEdit($id)
    {
        $value = Kasir::find($id);

        return view('kasir.passwordEdit', compact('value'));
    }

    public function passwordUpdate(Request $request, $id)
    {

        $kasir = Kasir::find($id);

        if ($kasir) {
            // update hanya password
            $kasir->password = bcrypt($request->password);
            $kasir->save();

            return redirect()->route('kasir.index')->with('success', 'Kasir updated successfully.');
        } else {
            return response()->json([
                'message' => 'Kasir not found.'
            ], 404);
        }
    }

    public function destroy($id) {
        $kasir = Kasir::findOrFail($id);
        $kasir->delete();

        return redirect()->route('kasir.index')->with('succes', 'Data kasir berhasil dihapus');
    }
}
