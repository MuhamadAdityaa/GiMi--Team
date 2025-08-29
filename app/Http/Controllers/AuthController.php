<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
};
use App\Models\{
    Admin,
    Member,
    Kasir,
};
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // cek di admins
        $tableAdmin = DB::table('admins')->where('username', $username)->first();
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            // regenerasi session biar status login tersimpan
            $request->session()->regenerate();

            return redirect()->route('admin');
        }
        
        // cek di kasirs
        $tableKasir = DB::table('kasirs')->where('username', $username)->first();
        if (Auth::guard('kasir')->attempt(['username' => $request->username, 'password'=> $request->password])) {
            // return redirect()->route('dashboard');
            return redirect()->route('kasir');
        }
        // if ($tableKasir && Hash::check($password, $tableKasir->password)) {
        //     return "Login sebagai Kasir";
        // }


        return back()->withErrors([
            'email' => 'Login gagal, periksa kembali data anda.',
        ]);
    }

    public function logout(Request $request)
    {
        // List guard yang kamu punya
        $guards = ['admin', 'kasir', 'member'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Logout hanya guard yang sedang login
                Auth::guard($guard)->logout();
                break; // keluar loop setelah ketemu
            }
        }

        // Hapus session & regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke login
        return redirect('/login');
    }
}
