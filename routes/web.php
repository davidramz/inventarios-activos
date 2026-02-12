<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('campus', CampusController::class);
    Route::resource('area', AreaController::class);
    Route::resource('proveedor',ProveedorController::class);
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('puesto', PuestoController::class);
});

require __DIR__.'/auth.php';
