<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/auth/register', [\App\Http\Controllers\AuthController::class, 'registerForm'])->name('auth.register_form');
Route::post('/auth/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');

Route::get('/auth/login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('auth.login_form');
Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.list');
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('categories.edit')->middleware('can:update-categories');

Route::put('/categories/{category}/update', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->name('categories.update')->middleware('can:update-categories');

Route::delete('/categories/{category}/delete', [\App\Http\Controllers\CategoryController::class, 'destroy'])
    ->name('categories.delete')->middleware('can:delete-categories');

Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::group([
    'middleware' => 'admin_role'
], function() {
    Route::resource('users', \App\Http\Controllers\UserController::class);
});

// Route::middleware('admin_role')->resource('users', \App\Http\Controllers\UserController::class);