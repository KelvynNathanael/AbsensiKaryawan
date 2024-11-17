<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AbsenController;


Route::get('/', [AbsenController::class, 'index'])->name('absen.index');
Route::post('/store', [AbsenController::class, 'store'])->name('absen.store');

Route::get('/x', [AbsenController::class, 'xTables'])->name('absen.xTables');

Route::get('/monthly', [AbsenController::class, 'monthlyAbsences'])->name('absen.monthly');
