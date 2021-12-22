<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('temporal-upload', [UploadController::class, 'storeImages'])->name('temporal_upload');
Route::post('delete-file/{fileId}', [UploadController::class, 'deleteFile'])->name('file.delete');

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
