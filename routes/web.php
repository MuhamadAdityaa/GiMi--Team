<?php
use Illuminate\Support\Facades\Route;

// ---------------------- LOGIN ----------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $username = $request->username;
    $password = $request->password;

    // Dummy login (hardcode role)
    if ($username === 'admin' && $password === 'admin123') {
        session(['username' => 'Admin', 'role' => 'admin']);
        return redirect()->route('dashboard.admin');
    } elseif ($username === 'kasir' && $password === 'kasir123') {
        session(['username' => 'Kasir', 'role' => 'kasir']);
        return redirect()->route('dashboard.kasir');
    } elseif ($username === 'member' && $password === 'member123') {
        session(['username' => 'Member', 'role' => 'member']);
        return redirect()->route('dashboard.member');
    }

    return back()->withErrors(['login' => 'Username atau password salah!']);
})->name('login.process');

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

// ---------------------- DASHBOARD ----------------------
// Admin
// Admin
Route::get('/dashboard/admin', function () {
    return view('dashboard.admin', [
        'totalMember'   => 120,   // dummy data
        'totalKasir'    => 5,     // dummy data
        'todayCheckin'  => 15,    // dummy data
        'latest' => [
            ['nama' => 'Budi', 'tanggal' => now()->format('d-m-Y H:i')],
            ['nama' => 'Siti', 'tanggal' => now()->subHour()->format('d-m-Y H:i')],
            ['nama' => 'Andi', 'tanggal' => now()->subHours(2)->format('d-m-Y H:i')],
        ] // dummy data terbaru checkin
    ]);
})->name('dashboard.admin');

// Kasir
Route::get('/dashboard/kasir', function () {
    return view('dashboard.kasir', [
        'totalMember' => 120,
        'hariIni' => 20
    ]);
})->name('dashboard.kasir');

// Member
Route::get('/dashboard/member', function () {
    return view('dashboard.member', [
        'sisaHari' => 10
    ]);
})->name('dashboard.member');

// ---------------------- MEMBER ----------------------
Route::get('/member', fn() => view('member.index'))->name('member.index');
Route::get('/member/create', fn() => view('member.create'))->name('member.create');

// ---------------------- LAPORAN ----------------------
Route::get('/laporan', fn() => view('laporan.index'))->name('laporan.index');
Route::get('/laporan/create', fn() => view('laporan.create'))->name('laporan.create');

// ---------------------- KASIR (khusus admin) ----------------------
Route::get('/kasir', fn() => view('kasir.index'))->name('kasir.index');
Route::get('/kasir/create', fn() => view('kasir.create'))->name('kasir.create');
