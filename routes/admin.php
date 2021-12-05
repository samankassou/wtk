<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('adverts', [AdminController::class, 'adverts'])->name('adverts');
Route::get('categories', [AdminController::class, 'categories'])->name('categories');
Route::get('cities', [AdminController::class, 'cities'])->name('cities');
Route::get('users', [AdminController::class, 'users'])->name('users');
