<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('admin.home');
})->name('dashboard.index');

Route::resource('categories', CategoryController::class);