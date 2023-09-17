<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Aktiviti
Route::get('/aktiviti', [App\Http\Controllers\AktivitiController::class, 'index'])->name('aktiviti.index');
Route::get('/aktiviti/create', [App\Http\Controllers\AktivitiController::class, 'create'])->name('aktiviti.create');
Route::post('/aktiviti/store', [App\Http\Controllers\AktivitiController::class, 'store'])->name('aktiviti.store');
Route::get('/aktiviti/edit/{id}', [App\Http\Controllers\AktivitiController::class, 'edit'])->name('aktiviti.edit');
Route::post('/aktiviti/update/{id}', [App\Http\Controllers\AktivitiController::class, 'update'])->name('aktiviti.update');
Route::post('/aktiviti/destroy', [App\Http\Controllers\AktivitiController::class, 'destroy'])->name('aktiviti.destroy');

// Laporan
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
