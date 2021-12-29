<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EditCityController;
use App\Http\Controllers\Admin\ShowCityController;
use App\Http\Controllers\Admin\ShowUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShowAgentController;
use App\Http\Controllers\Admin\ShowUsersController;
use App\Http\Controllers\Admin\CreateCityController;
use App\Http\Controllers\Admin\CreateUserController;
use App\Http\Controllers\Admin\DeleteCityController;
use App\Http\Controllers\Admin\DeleteUserController;
use App\Http\Controllers\Admin\ShowAdvertController;
use App\Http\Controllers\Admin\ShowAgentsController;
use App\Http\Controllers\Admin\ShowCitiesController;
use App\Http\Controllers\Admin\UpdateCityController;
use App\Http\Controllers\Admin\UpdateUserController;
use App\Http\Controllers\Admin\CreateAgentController;
use App\Http\Controllers\Admin\DeleteAgentController;
use App\Http\Controllers\Admin\ShowAdvertsController;
use App\Http\Controllers\Admin\UpdateAgentController;
use App\Http\Controllers\Admin\CreateAdvertController;
use App\Http\Controllers\Admin\DeleteAdvertController;
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
Route::get('users/create', [CreateUserController::class, 'create'])->name('users.create');
Route::post('users', [CreateUserController::class, 'store'])->name('users.store');
Route::get('users/{user}', ShowUserController::class)->name('users.show');
Route::get('users/{user}/edit', [UpdateUserController::class, 'edit'])->name('users.edit');
Route::patch('users/{user}', [UpdateUserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', DeleteUserController::class)->name('users.destroy');

// Agents management routes
Route::get('agents', ShowAgentsController::class)->name('agents.index');
Route::get('agents/create', [CreateAgentController::class, 'create'])->name('agents.create');
Route::post('agents', [CreateAgentController::class, 'store'])->name('agents.store');
Route::get('agents/{agent}', ShowAgentController::class)->name('agents.show');
Route::get('agents/{agent}/edit', [UpdateAgentController::class, 'edit'])->name('agents.edit');
Route::patch('agents/{agent}', [UpdateAgentController::class, 'update'])->name('agents.update');
Route::delete('agents/{agent}', DeleteAgentController::class)->name('agents.destroy');

// Cities management routes
Route::get('cities', ShowCitiesController::class)->name('cities.index');
Route::get('cities/create', [CreateCityController::class, 'create'])->name('cities.create');
Route::post('cities', [CreateCityController::class, 'store'])->name('cities.store');
Route::get('cities/{city}', ShowCityController::class)->name('cities.show');
Route::get('cities/{city}/edit', EditCityController::class)->name('cities.edit');
Route::patch('cities/{city}', UpdateCityController::class)->name('cities.update');
Route::delete('cities/{city}', DeleteCityController::class)->name('cities.destroy');

// Categories management routes
Route::get('categories', ShowCategoriesController::class)->name('categories.index');
Route::get('categories/create', [CreateCategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CreateCategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', ShowCategoryController::class)->name('categories.show');
Route::get('categories/{category}/edit', [UpdateCategoryController::class, 'edit'])->name('categories.edit');
Route::patch('categories/{category}', [UpdateCategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', DeleteCategoryController::class)->name('categories.destroy');

// Adverts management routes
Route::get('adverts', ShowAdvertsController::class)->name('adverts.index');
Route::get('adverts/create', [CreateAdvertController::class, 'create'])->name('adverts.create');
Route::post('adverts', [CreateAdvertController::class, 'store'])->name('adverts.store');
Route::get('adverts/{advert}', ShowAdvertController::class)->name('adverts.show');
Route::get('adverts/{advert}/edit', [UpdateAdvertController::class, 'edit'])->name('adverts.edit');
Route::patch('adverts/{advert}', [UpdateAdvertController::class, 'update'])->name('adverts.update');
Route::delete('adverts/{advert}', DeleteAdvertController::class)->name('adverts.destroy');
