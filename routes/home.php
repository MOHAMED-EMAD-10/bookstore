<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
