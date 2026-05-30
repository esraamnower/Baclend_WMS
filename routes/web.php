<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// مسار لوحة الإحصائيات (الداشبورد)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/items/export/excel', [App\Http\Controllers\ItemController::class, 'exportExcel'])->name('items.export.excel');
Route::get('/items/export/pdf', [App\Http\Controllers\ItemController::class, 'exportPdf'])->name('items.export.pdf');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->middleware(['auth', 'verified'])->name('orders.index');
Route::patch('/orders/{order}/status', [App\Http\Controllers\OrderController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('orders.updateStatus');

// مسار الجرد السنوي
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->middleware(['auth', 'verified'])->name('inventory.index');
Route::post('/inventory', [App\Http\Controllers\InventoryController::class, 'store'])->middleware(['auth', 'verified'])->name('inventory.store');
Route::post('/inventory/resolve', [App\Http\Controllers\InventoryController::class, 'resolve'])->middleware(['auth', 'verified'])->name('inventory.resolve');
Route::post('/inventory/close', [App\Http\Controllers\InventoryController::class, 'close'])->middleware(['auth', 'verified'])->name('inventory.close');

// مسار الصيانة والتوالف
Route::get('/maintenance', [App\Http\Controllers\MaintenanceController::class, 'index'])->middleware(['auth', 'verified'])->name('maintenance.index');

// مسار التقارير والتصدير
Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('reports.index');

// مسار سجل العمليات
Route::get('/logs', [App\Http\Controllers\LogController::class, 'index'])->middleware(['auth', 'verified'])->name('logs.index');

// مسار إعدادات النظام
Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->middleware(['auth', 'verified'])->name('settings.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::patch('users/{user}/role', [App\Http\Controllers\UserController::class, 'updateRole'])->name('users.updateRole');
    Route::patch('users/{user}/password', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('users.resetPassword');
    Route::patch('users/{user}/status', [App\Http\Controllers\UserController::class, 'toggleStatus'])->name('users.toggleStatus');
});

require __DIR__.'/auth.php';