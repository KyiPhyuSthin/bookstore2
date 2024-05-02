<?php

use Illuminate\Support\Facades\Route;

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
        Route::view('/', 'management.categories.index')->name('index');
        // Route::post('/', [CategoryController::class, 'store'])->name('store');
        // Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        // Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });
});
Route::get('/management', function () {
    return view('management.test');
});
