<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
};

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/login', 'authenticate')->name('login.process');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
