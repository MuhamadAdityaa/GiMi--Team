<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Member,
    Kasir
};
use App\Http\Requests\MemberRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();

        return view('members.index', compact('member'));
    }

    public function create()
    {
        $kasirs = Kasir::all();

        return view('members.create', compact('kasirs'));
    }

    public function store(MemberRequest $request)
    {
        $role = 'member';
        // generate QR code (isinya bisa id, atau link, atau kombinasi unik)
        $token = str::uuid();

        $qrContent = route('member.qrkode', ['id' => $token]);
        $qrImage = QrCode::size(300)->generate($qrContent);
        // $qrImage = QrCode::format('png')
        //     ->size(300)
        //     ->errorCorrection('H')
        //     ->generate($qrContent);

        // bikin path file (misal: storage/app/public/qrcodes/member-1.png)
        $filePath = 'qrkodes/member/' . $token . '.png';


        // simpan file ke storage
        Storage::disk('public')->put($filePath, $qrImage);

        // update field kode_qr dengan path

        Member::create([
            'role' => $role,
            'name' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->nomer_telp,
            'password' => bcrypt($request->password),
            'paket' => $request->paket,
            'kode_qr' => $token,
            'tanggal_buat' => now()->toDateString(),
            'kasirs_id' => $request->kasir,
        ]);

        return redirect()->route('members.index')->with('succes', 'Data member berhasil ditambahkan');
    }

    public function showEdit($id)
    {
        return view('members.edit');
    }

    public function qrkode($id)
    {
        return view('members.index');
    }
}
