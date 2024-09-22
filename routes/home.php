<?php

use App\Http\Controllers\Home\BorrowingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::post('book/{book:slug}', [BorrowingController::class, 'borrow'])->name('home.borrow');
    Route::get('books/{book:slug}', [HomeController::class, 'show'])->name('home.show');
});
