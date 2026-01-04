<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\GameController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Redirect login berdasarkan role
Route::get('/dashboard', function () {
    if(auth()->user()->role === 'admin'){
        return redirect()->route('games.index'); // admin langsung ke manage games
    }
    return redirect()->route('user.dashboard'); // user ke dashboard biasa
})->middleware(['auth', 'verified'])->name('dashboard');

// User dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes (CRUD Game)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/admin/games', GameController::class)->names([
        'index' => 'games.index',
        'create' => 'games.create',
        'store' => 'games.store',
        'edit' => 'games.edit',
        'update' => 'games.update',
        'destroy' => 'games.destroy',
    ]);
});

require __DIR__.'/auth.php';
