<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController; 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FavouriteController;

Route::post('/favourites/{bookId}', [FavouriteController::class, 'addToFavourites'])->name('favourites.add');
Route::delete('/favourites/{bookId}', [FavouriteController::class, 'removeFromFavourites'])->name('favourites.remove');
Route::get('/favourites', [FavouriteController::class, 'showFavourites'])->middleware('auth')->name('favourites.list');



Route::get('/', [CategoryController::class, 'index'])->name('home'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');

require __DIR__.'/auth.php';
