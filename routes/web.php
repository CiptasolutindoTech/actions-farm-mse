<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UnitController;

// Route::view('/', 'welcome');
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirect ke halaman login setelah logout
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('menus')->name('menus.')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('index');
});

Route::prefix('unit')->name('unit.')->group(function () {
    Route::get('/', [UnitController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [UnitController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [UnitController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{unit}/edit', [UnitController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{unit}', [UnitController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{unit}', [UnitController::class, 'destroy'])->name('destroy');  // Proses delete unit
});

require __DIR__.'/auth.php';
