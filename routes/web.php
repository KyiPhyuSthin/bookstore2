<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubCategoryController;

use App\Http\Controllers\WEBSITE\AuthController;
use App\Http\Controllers\WEBSITE\OrderCheckoutController;
use App\Http\Controllers\WEBSITE\PagesController;

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

Route::get('/', [PagesController::class, "index"])->name("website.home");
Route::get('/categories/{category}', [PagesController::class, "categoryDetail"])->name("website.category_detail");
Route::get('/books/{book}', [PagesController::class, "bookDetail"])->name("website.book_detail");
Route::get('/cart', [PagesController::class, "cart"])->name("website.cart");

Route::middleware('auth')->group(function(){
    Route::get('/checkout', [OrderCheckoutController::class, "checkout"])->name("website.checkout");
    Route::post('/order', [OrderCheckoutController::class, "order"])->name("website.order");
    Route::view('/thank_you', 'website.thank_you')->name("website.thank_you");
    Route::post('/sign_out', [AuthController::class, "signOut"])->name("website.sign_out");
});

Route::view('/sign-in', 'website.auth.sign_in_register')->name("website.user_sign_in");

Route::post('/sign_in', [AuthController::class, "signIn"])->name("website.sign_in");
Route::post('/register', [AuthController::class, "register"])->name("website.register");

Route::get('/test', function () {
    return view('website.test');
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

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        // Route::get('/create', [BookController::class, 'create'])->name('create');
        // Route::post('/', [BookController::class, 'store'])->name('store');
        // Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
        // Route::put('/{book}', [BookController::class, 'update'])->name('update');
        // Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/management', function () {
    return view('management.test');
});
