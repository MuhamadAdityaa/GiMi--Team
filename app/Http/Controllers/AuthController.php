<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if ($tableAdmin && Hash::check($password, $tableAdmin->password)) {
            return "Login sebagai Admin";
        }

        // cek di members
        $tableMember = DB::table('members')->where('username', $username)->first();
        if ($tableMember && Hash::check($password, $tableMember->password)) {
            return "Login sebagai Member";
        }

        // cek di kasirs
        $tableKasir = DB::table('kasirs')->where('username', $username)->first();
        if ($tableKasir && Hash::check($password, $tableKasir->password)) {
            return "Login sebagai Kasir";
        }


        return view('auth.login');
    }
}
