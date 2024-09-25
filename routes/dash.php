<?php

use App\Http\Controllers\Dashboard\BorrowingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::name('dashboard.')->group(function () {
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::match(['put', 'patch'], 'categories/{category:slug}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category:slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // books
        // Route::resource('books', BookController::class);
        Route::get('books', [BookController::class, 'index'])->name('books.index');
        Route::get('books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book:slug}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::match(['put', 'patch'], '/books/{book:slug}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book:slug}', [BookController::class, 'destroy'])->name('books.destroy');

        // borrowings
        Route::get('borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
        Route::get('borrowings/request', [BorrowingController::class, 'request'])->name('borrowings.request');
        Route::post('borrowings/{borrow}/reject', [BorrowingController::class, 'reject'])->name('borrowings.reject');
        Route::post('borrowings/{borrow}/accept', [BorrowingController::class, 'accept'])->name('borrowings.accept');
    });
});