<?php

use App\Http\Controllers\Home\BorrowingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::post('book/{book:slug}', [BorrowingController::class, 'borrow'])->name('home.borrow');
    Route::get('books/{book:slug}', [HomeController::class, 'show'])->name('home.show');
    Route::get('borrowed-books', [BorrowingController::class, 'borrowed'])->name('home.borrowed');
});
