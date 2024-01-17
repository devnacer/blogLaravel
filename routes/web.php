<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Route::resource('category', CategoryController::class);
Route::resource('profil', ProfilController::class);
Route::resource('article', ArticleController::class);
