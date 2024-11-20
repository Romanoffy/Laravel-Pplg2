<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/to-do', [HomeController::class, 'store']);
Route::delete('/to-do/{id}', [HomeController::class, 'destroy'])->name('delete.activity');
Route::get('/update-activity/{id}', [HomeController::class, 'show'])->name('show.activity');
Route::put('/update-activity/{id}', [HomeController::class, 'update'])->name('update.activity');

