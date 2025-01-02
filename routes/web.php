<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;

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

Route::resource('movies', MovieController::class);
Route::resource('genres', GenreController::class);
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
