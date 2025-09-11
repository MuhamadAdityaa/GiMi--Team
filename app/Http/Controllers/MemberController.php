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
use Carbon\Carbon;


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

        $qrImage = QrCode::format('png')->size(300)->generate($token);
        // $qrImage = QrCode::format('png')
        //     ->size(300)
        //     ->errorCorrection('H')
        //     ->generate($qrContent);

        // bikin path file (misal: storage/app/public/qrcodes/member-1.png)
        $filePath = 'qrkodes/member/' . $token . '.png';

        // simpan file ke storage
        Storage::disk('public')->put($filePath, $qrImage);

        if ($request->paket == 1) {
            $tanggal_berakhir = now()->addDays(30)->toDateString();
        } elseif ($request->paket == 2) {
            $tanggal_berakhir = now()->addDays(60)->toDateString();
        } elseif ($request->paket == 3) {
            $tanggal_berakhir = now()->addDays(90)->toDateString();
        }
        // update field kode_qr dengan path

        Member::create([
            'role' => $role,
            'name' => $request->nama,
            'username' => $request->username,
            'no_telp' => $request->nomer_telp,
            'password' => bcrypt($request->password),
            'paket' => $request->paket,
            'kode_qr' => $token,
            'tanggal_buat' => Carbon::now()->toDateString(),
            'kasirs_id' => $request->kasir,
            'tanggal_berakhir' => $tanggal_berakhir,

        ]);

        return redirect()->route('member.index')->with('succes', 'Data member berhasil ditambahkan');
    }

    public function showEdit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {

        $member = Member::find($id);

        if ($member) {
            $member->update([
                'name' => $request->nama,
                'username' => $request->username,
                'no_telp' => $request->nomer_telp,
                // 'tanggal_berakhir' => now()->addDays($request->paket == 1 ? 30 : ($request->paket == 2 ? 60 : 90))->toDateString(),
                'tanggal_update' => Carbon::now()->toDateString(),
            ]);
            return redirect()->route('member.index')->with('success', 'Member updated successfully.');
        } else {
            return response()->json([
                'message' => 'Member not found.'
            ], 404);
        }
    }

    public function passwordEdit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.passwordEdit', compact('member'));
    }

    public function passwordUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:4',
        ]);

        $member = Member::find($id);

        if ($member) {
            $member->update([
                'password' => bcrypt($request->password),
                'tanggal_update' => Carbon::now()->toDateString(),
            ]);
            return redirect()->route('member.index')->with('success', 'Password updated successfully.');
        } else {
            return response()->json([
                'message' => 'Member not found.'
            ], 404);
        }
    }

    public function langgananEdit($id)
    {
        $member = Member::findOrFail($id);

        return view('members.langgananUpdate', compact('member'));
    }

    public function langgananUpdate(Request $request, $id)
    {
        $request->validate([
            'paket' => 'required|in:1,2,3',
        ]);

        $member = Member::find($id);

        if ($member) {
            if ($request->paket == 1) {
                $tanggal_berakhir = now()->addDays(30)->toDateString();
            } elseif ($request->paket == 2) {
                $tanggal_berakhir = now()->addDays(60)->toDateString();
            } elseif ($request->paket == 3) {
                $tanggal_berakhir = now()->addDays(90)->toDateString();
            }

            $member->update([
                'paket' => $request->paket,
                'tanggal_berakhir' => $tanggal_berakhir,
                'tanggal_update' => Carbon::now()->toDateString(),
            ]);
            return redirect()->route('member.index')->with('success', 'Langganan updated successfully.');
        } else {
            return response()->json([
                'message' => 'Member not found.'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $member = Member::find($id);

        if ($member) {
            $member->delete();
            return redirect()->route('member.index')->with('success', 'Member deleted successfully.');
        } else {
            return response()->json([
                'message' => 'Member not found.'
            ], 404);
        }
    }

}
