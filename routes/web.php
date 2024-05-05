<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('sub_categories')->name('sub_categories.')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::post('/', [SubCategoryController::class, 'store'])->name('store');
        Route::put('/{subCategory}', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/{subCategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('genres')->name('genres.')->group(function () {
        Route::get('/', [GenresController::class, 'index'])->name('index');
        Route::post('/', [GenresController::class, 'store'])->name('store');
        Route::put('/{genre}', [GenresController::class, 'update'])->name('update');
        Route::delete('/{genre}', [GenresController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::post('/', [BookController::class, 'store'])->name('store');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
        Route::put('/{book}', [BookController::class, 'update'])->name('update');
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/management', function () {
    return view('management.test');
});
