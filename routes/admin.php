<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('cities', [AdminController::class, 'cities'])->name('cities');
