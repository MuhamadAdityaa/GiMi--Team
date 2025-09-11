<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    MemberController,
    KasirController,
};
use App\Http\Middleware\login;
// use App\Http\Middleware\checkById as check;

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'showLoginForm')->name('login')->Middleware('login');
    Route::post('/login/process', 'authenticate')->name('login.process');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(dashboardController::class)->group(function(){
    Route::get('/', 'index')->name('dashboard')->Middleware('login');
    Route::get('/admin', 'admin')->name('admin.dashboard')->Middleware(['admin']);
    Route::get('/kasir', 'kasir')->name('kasir')->middleware(['kasir']);
    Route::get('/member', 'member')->name('member')->middleware(['member']);
});

Route::controller(MemberController::class)->group(function(){
    Route::get('/member', 'index')->name('member.index')->middleware(['admin']);
    Route::get('/member/create', 'create')->name('member.create')->middleware('admin');
    Route::post('/member/create/store', 'store')->name('member.create.store');
    Route::get('/member/edit/{id}', 'showEdit')->name('member.edit')->middleware('admin');

    Route::get('/profile/member/qrkode/{id}', 'qrkode')->name('member.qrkode');
});

Route::middleware('admin')->controller(KasirController::class)->group(function() {
    Route::get('/kasir', 'index')->name('kasir.index');
    Route::get('/kasir/create', 'create')->name('kasir.create');
    Route::post('/kasir/create/store', 'store')->name('kasir.create.store');
    Route::get('/kasir/edit/{id}', 'showEdit')->name('kasir.showEdit');
    Route::put('/kasir/update/{id}', 'update')->name('kasir.update');
    Route::get('/kasir/edit/password/{id}', 'passwordEdit')->name('kasir.edit.password');
    Route::put('kasir/update/password/{id}', 'passwordUpdate')->name('kasir.update.password');
    Route::delete('/kasir/delete/{id}', 'destroy')->name('kasir.delete');
});
