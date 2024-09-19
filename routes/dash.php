<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::name('dashboard.')->group(function () {
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::match(['put', 'patch'], 'categories/{category:slug}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category:slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
});