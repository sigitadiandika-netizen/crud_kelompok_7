<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kendaraan', [KendaraanController::class, 'index'])
    ->name('kendaraan.index');

Route::get('/kendaraan/create', [KendaraanController::class, 'create'])
    ->name('kendaraan.create');

Route::post('/kendaraan', [KendaraanController::class, 'store'])
    ->name('kendaraan.store');

