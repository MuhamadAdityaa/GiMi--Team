<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
};
use App\Http\Middleware\login;
// use App\Http\Middleware\checkById as check;

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login/process', 'authenticate')->name('login.process');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(dashboardController::class)->group(function(){
    Route::get('/', 'index')->name('dashboard')->Middleware(login::class);
    Route::get('/admin', 'admin')->name('admin')->Middleware(['check', 'auth:admin']);
    // Route::get('/kasir', 'kasir')->name('kasir')->Middleware([check::class, 'role:kasir']);
    // Route::get('/admin', 'admin')->name('admin')->Middleware('auth:admin');
    Route::get('/kasir', 'kasir')->name('kasir')->Middleware('auth:kasir');
});
