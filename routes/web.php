<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WishListController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('temporal-upload', [UploadController::class, 'storeImages'])->name('temporal_upload');
Route::post('delete-file/{fileId}', [UploadController::class, 'deleteFile'])->name('file.delete');

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');


// properties routes
Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('properties/{property:slug}', [PropertyController::class, 'show'])->name('properties.show');

// wishlist routes
Route::post('/wishlist/add/{id}', [WishListController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove/{id}', [WishListController::class, 'remove'])->name('wishlist.remove');
Route::get('wishlist/count', [WishListController::class, 'getWishListCount'])->name('wishlist.count');
Route::get('wishlist/all', [WishListController::class, 'getWishList'])->name('wishlist.all');

// agents routes
Route::get('agents/{agent:username}', [AgentController::class, 'index'])->name('agents.index');
