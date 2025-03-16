<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('authors')->name('authors.')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::post('/', [AuthorController::class, 'store'])->name('store');
    Route::get('{authorId}', [AuthorController::class, 'show'])->name('show');
    Route::put('{authorId}', [AuthorController::class, 'update'])->name('update');
    Route::delete('{authorId}', [AuthorController::class, 'destroy'])->name('destroy');
});

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('{bookId}', [BookController::class, 'show'])->name('show');
    Route::put('{bookId}', [BookController::class, 'update'])->name('update');
    Route::delete('{bookId}', [BookController::class, 'destroy'])->name('destroy');
});
