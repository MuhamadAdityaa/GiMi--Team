<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    MemberController,
    KasirController,
    LaporanController,
    QrcodeController,
    UserController,
};
use App\Http\Middleware\login;
// use App\Http\Middleware\checkById as check;

// ROUTE BAGIAN ADMINISTRATOR & KASIR
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'showLoginForm')->name('login')->Middleware('login');
    Route::post('/login/process', 'authenticate')->name('login.process');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(dashboardController::class)->group(function(){
    Route::get('/', 'index')->name('dashboard')->Middleware('login');
    Route::get('/admin', 'admin')->name('admin.dashboard')->Middleware(['admin']);
    Route::get('/kasir', 'kasir')->name('kasir.dashboard')->middleware(['kasir']);
});

Route::middleware('admin')->controller(MemberController::class)->group(function(){
    Route::get('/member', 'index')->name('member.index');
    Route::get('/member/create', 'create')->name('member.create');
    Route::post('/member/create/store', 'store')->name('member.create.store');
    Route::get('/member/edit/{id}', 'showEdit')->name('member.edit');
    Route::put('/member/update/{id}', 'update')->name('member.update');
    Route::get('/member/edit/password/{id}', 'passwordEdit')->name('member.edit.password');
    Route::put('/member/update/password/{id}', 'passwordUpdate')->name('member.update.password');
    Route::get('/member/langganan/{id}', 'langgananEdit')->name('member.langganan');
    Route::put('/member/langganan/update/{id}', 'langgananUpdate')->name('member.langganan.update');
    Route::delete('/member/delete/{id}', 'destroy')->name('member.delete');
});

Route::middleware('admin')->controller(QrcodeController::class)->group(function() {
    Route::get('/kamera', 'index')->name('kamera.scan');
    Route::get('/kamera/laporan', 'create')->name('kamera.create');
    Route::get('/kamera/laporan/store/{member}', 'store')->name('kamera.store');
});

Route::middleware('admin')->controller(LaporanController::class)->group(function() {
    Route::get('/laporan', 'index')->name('laporan.index');
    Route::get('/laporan/create', 'create')->name('laporan.create');
    Route::post('/laporan/create/store', 'store')->name('laporan.create.store');
    Route::get('/laporan/edit/{id}', 'showEdit')->name('laporan.showEdit')->middleware('kasir');
    Route::put('/laporan/update/{id}', 'update')->name('laporan.update')->middleware('kasir');
    Route::delete('/laporan/delete/{id}', 'destroy')->name('laporan.delete')->middleware('kasir');
});

Route::middleware(['admin', 'kasir'])->controller(KasirController::class)->group(function() {
    Route::get('/kasir/index', 'index')->name('kasir.index');
    Route::get('/kasir/create', 'create')->name('kasir.create');
    Route::post('/kasir/create/store', 'store')->name('kasir.create.store');
    Route::get('/kasir/edit/{id}', 'showEdit')->name('kasir.showEdit');
    Route::put('/kasir/update/{id}', 'update')->name('kasir.update');
    Route::get('/kasir/edit/password/{id}', 'passwordEdit')->name('kasir.edit.password');
    Route::put('/kasir/update/password/{id}', 'passwordUpdate')->name('kasir.update.password');
    Route::delete('/kasir/delete/{id}', 'destroy')->name('kasir.delete');
});




// ROUTE UNTUK BAGIAN USER MEMBER
Route::middleware('member')->controller(UserController::class)->group(function() {
    Route::get('/user', 'index')->name('member.dashboard');
    Route::get('/user/profile/{id}', 'profile')->name('user.profile');
});
