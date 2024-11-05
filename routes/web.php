<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnalyticsController;


Route::view('/', 'pages.home')->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('pages.admin.index');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

Route::post('/highest-sales', [HomeController::class, 'highestTheaterSales']);
Route::post('/highest-movie-sales', [HomeController::class, 'highestMovieSales'])->name('highestMovieSales');

Route::post('/admin/theaters', [AdminController::class, 'storeTheater'])->name('admin.storeTheater');
Route::post('/admin/movies', [AdminController::class, 'storeMovie'])->name('admin.storeMovie');
Route::post('/admin/sales', [AdminController::class, 'storeSale'])->name('admin.storeSale');
Route::put('/admin/theaters/{id}', [AdminController::class, 'updateTheater'])->name('admin.updateTheater');
Route::put('/admin/movies/{id}', [AdminController::class, 'updateMovie'])->name('admin.updateMovie');
Route::put('/admin/sales/{id}', [AdminController::class, 'updateSale'])->name('admin.updateSale');
Route::delete('/admin/theaters/{id}', [AdminController::class, 'destroyTheater'])->name('admin.destroyTheater');
Route::delete('/admin/movies/{id}', [AdminController::class, 'destroyMovie'])->name('admin.destroyMovie');
Route::delete('/admin/sales/{id}', [AdminController::class, 'destroySale'])->name('admin.destroySale');

