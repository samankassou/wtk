<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EditCityController;
use App\Http\Controllers\Admin\EditUserController;
use App\Http\Controllers\Admin\ShowCityController;
use App\Http\Controllers\Admin\ShowUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShowUsersController;
use App\Http\Controllers\Admin\StoreCityController;
use App\Http\Controllers\Admin\StoreUserController;
use App\Http\Controllers\Admin\CreateCityController;
use App\Http\Controllers\Admin\CreateUserController;
use App\Http\Controllers\Admin\DeleteCityController;
use App\Http\Controllers\Admin\DeleteUserController;
use App\Http\Controllers\Admin\EditAdvertController;
use App\Http\Controllers\Admin\ShowAdvertController;
use App\Http\Controllers\Admin\ShowAgentsController;
use App\Http\Controllers\Admin\ShowCitiesController;
use App\Http\Controllers\Admin\UpdateCityController;
use App\Http\Controllers\Admin\UpdateUserController;
use App\Http\Controllers\Admin\ShowAdvertsController;
use App\Http\Controllers\Admin\StoreAdvertController;
use App\Http\Controllers\Admin\CreateAdvertController;
use App\Http\Controllers\Admin\DeleteAdvertController;
use App\Http\Controllers\Admin\EditCategoryController;
use App\Http\Controllers\Admin\ShowCategoryController;
use App\Http\Controllers\Admin\UpdateAdvertController;
use App\Http\Controllers\Admin\CreateCategoryController;
use App\Http\Controllers\Admin\DeleteCategoryController;
use App\Http\Controllers\Admin\ShowCategoriesController;
use App\Http\Controllers\Admin\UpdateCategoryController;


// Dashboard route
Route::get('dashboard', DashboardController::class)->name('dashboard');

// Users management routes
Route::get('users', ShowUsersController::class)->name('users.index');
Route::get('users/create', CreateUserController::class)->name('users.create');
Route::post('users', StoreUserController::class)->name('users.store');
Route::get('users/{user}', ShowUserController::class)->name('users.show');
Route::get('users/{user}/edit', EditUserController::class)->name('users.edit');
Route::patch('users/{user}', UpdateUserController::class)->name('users.update');
Route::delete('users/{user}', DeleteUserController::class)->name('users.destroy');

// Agents management routes
Route::get('agents', ShowAgentsController::class)->name('agents.index');

// Cities management routes
Route::get('cities', ShowCitiesController::class)->name('cities.index');
Route::get('cities/create', CreateCityController::class)->name('cities.create');
Route::post('cities', StoreCityController::class)->name('cities.store');
Route::get('cities/{city}', ShowCityController::class)->name('cities.show');
Route::get('cities/{city}/edit', EditCityController::class)->name('cities.edit');
Route::patch('cities/{city}', UpdateCityController::class)->name('cities.update');
Route::delete('cities/{city}', DeleteCityController::class)->name('cities.destroy');

// Categories management routes
Route::get('categories', ShowCategoriesController::class)->name('categories.index');
Route::get('categories/create', [CreateCategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CreateCategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', ShowCategoryController::class)->name('categories.show');
Route::get('categories/{category}/edit', EditCategoryController::class)->name('categories.edit');
Route::patch('categories/{category}', UpdateCategoryController::class)->name('categories.update');
Route::delete('categories/{category}', DeleteCategoryController::class)->name('categories.destroy');

// Adverts management routes
Route::get('adverts', ShowAdvertsController::class)->name('adverts.index');
Route::get('adverts/create', CreateAdvertController::class)->name('adverts.create');
Route::post('adverts', StoreAdvertController::class)->name('adverts.store');
Route::get('adverts/{advert}', ShowAdvertController::class)->name('adverts.show');
Route::get('adverts/{advert}/edit', EditAdvertController::class)->name('adverts.edit');
Route::patch('adverts/{advert}', UpdateAdvertController::class)->name('adverts.update');
Route::delete('adverts/{advert}', DeleteAdvertController::class)->name('adverts.destroy');
