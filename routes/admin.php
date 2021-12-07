<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('adverts', [AdminController::class, 'adverts'])->name('adverts.index');
Route::get('categories', [AdminController::class, 'categories'])->name('categories.index');
Route::get('cities', [AdminController::class, 'cities'])->name('cities.index');
Route::get('users', [AdminController::class, 'users'])->name('users.index');
Route::get('users/{user}', [AdminController::class, 'show_user'])->name('users.show');
Route::get('users/create', [AdminController::class, 'create_user'])->name('users.create');
Route::post('users/store', [AdminController::class, 'store_user'])->name('users.store');
Route::get('users/{user}/edit', [AdminController::class, 'edit_user'])->name('users.edit');
Route::patch('users/{user}/update', [AdminController::class, 'update_user'])->name('users.update');
Route::delete('users/{user}/delete', [AdminController::class, 'delete_user'])->name('users.delete');
