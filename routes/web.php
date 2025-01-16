<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CageController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CoreBranchController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseLocationController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Route::view('/', 'welcome');
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirect ke halaman login setelah logout
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [CategoryController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [CategoryController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{category}', [CategoryController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('item')->name('item.')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [ItemController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [ItemController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{item}/edit', [ItemController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{item}', [ItemController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{item}', [ItemController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('feed')->name('feed.')->group(function () {
    Route::get('/', [FeedController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [FeedController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [FeedController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{feed}/edit', [FeedController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{feed}', [FeedController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{feed}', [FeedController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('hewan')->name('hewan.')->group(function () {
    Route::get('/', [HewanController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [HewanController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [HewanController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{hewan}/edit', [HewanController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{hewan}', [HewanController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{hewan}', [HewanController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('obat')->name('obat.')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [ObatController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [ObatController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{obat}/edit', [ObatController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{obat}', [ObatController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{obat}', [ObatController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('kandang')->name('kandang.')->group(function () {
    Route::get('/', [CageController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [CageController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [CageController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{kandang}/edit', [CageController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{kandang}', [CageController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{kandang}', [CageController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('CoreBranch')->name('CoreBranch.')->group(function () {
    Route::get('/', [CoreBranchController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [CoreBranchController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [CoreBranchController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{CoreBranch}/edit', [CoreBranchController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{CoreBranch}', [CoreBranchController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{CoreBranch}', [CoreBranchController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('Warehouse')->name('Warehouse.')->group(function () {
    Route::get('/', [WarehouseController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [WarehouseController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [WarehouseController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{Warehouse}/edit', [WarehouseController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{Warehouse}', [WarehouseController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{Warehouse}', [WarehouseController::class, 'destroy'])->name('destroy');  // Proses delete unit
});

Route::prefix('WarehouseLocation')->name('WarehouseLocation.')->group(function () {
    Route::get('/', [WarehouseLocationController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [WarehouseLocationController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [WarehouseLocationController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{WarehouseLocation}/edit', [WarehouseLocationController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{WarehouseLocation}', [WarehouseLocationController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{WarehouseLocation}', [WarehouseLocationController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('inventory-stock')->name('inventory-stock.')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('index');  // Menampilkan list unit
});
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [CustomerController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [CustomerController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{customer}/edit', [CustomerController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{customer}', [CustomerController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{customer}', [CustomerController::class, 'destroy'])->name('destroy');  // Proses delete unit
});

Route::prefix('Supplier')->name('Supplier.')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');  // Menampilkan list unit
    Route::get('/create', [SupplierController::class, 'create'])->name('create');  // Menampilkan form create unit
    Route::post('/', [SupplierController::class, 'store'])->name('store');  // Proses create unit
    Route::get('{Supplier}/edit', [SupplierController::class, 'edit'])->name('edit');  // Menampilkan form edit unit
    Route::put('{Supplier}', [SupplierController::class, 'update'])->name('update');  // Proses update unit
    Route::delete('{Supplier}', [SupplierController::class, 'destroy'])->name('destroy');  // Proses delete unit
});
Route::prefix('Supplier')->name('Supplier.')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');  // Menampilkan list unit
});

require __DIR__.'/auth.php';
