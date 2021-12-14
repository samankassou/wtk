<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('temporal-upload', [HomeController::class, 'storeImages'])->name('temporal_upload');

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
