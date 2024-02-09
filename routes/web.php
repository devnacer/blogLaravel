<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;

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

Route::resource('admin/category', CategoryController::class);
Route::resource('admin/profil', ProfilController::class);
Route::resource('admin/article', ArticleController::class);
Route::get('admin/articles', [ArticleController::class, 'indexArticlesProfil'])->name('articles.index');
Route::get('admin/home', [ProfilController::class, 'home'])->name('profil.home');

Route::get('admin/setting/{profil}', [SettingController::class, 'show'])->name('setting.show');
Route::delete('admin/setting/{profil}', [SettingController::class, 'destroy'])->name('setting.destroy');

// login
Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//frontend
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/article/{article}', [FrontendController::class, 'showArticle'])->name('front.showArticle');

// index articles they have the same category 
Route::get('/articles/category/{category}', [FrontendController::class, 'ArticlesByCategory'])->name('ArticlesByCategory');

Route::get('/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontendController::class, 'sendMessage'])->name('front.sendMessage');
