<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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

Route::resource('admin/category', CategoryController::class)->except([
    'show'
]);
Route::resource('admin/profil', ProfilController::class)->except([
    'show'
]);
Route::get('admin/profils-admins', [ProfilController::class, 'indexAdmins'])->name('profil.indexAdmins');
Route::resource('admin/article', ArticleController::class);
Route::get('admin/articles', [ArticleController::class, 'indexArticlesProfil'])->name('articles.index');
Route::get('admin/home', [ArticleController::class, 'home'])->name('profil.home');

//setting
Route::get('admin/setting/{profil}', [SettingController::class, 'edit'])->name('setting.edit');
Route::put('admin/setting/{profil}', [SettingController::class, 'update'])->name('setting.update');
Route::delete('admin/setting/{profil}', [SettingController::class, 'destroy'])->name('setting.destroy');

// login
Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//frontend
Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/article/{article}', [FrontendController::class, 'showArticle'])->name('front.showArticle');
//comment
// add comment for guest
Route::post('/article/{article}', [CommentController::class, 'store'])->name('front.storeComment');
// delete comment / only admine authorise to do this
Route::delete('/admin/article/{article}/comment/{comment}', [CommentController::class, 'destroy'])
    ->name('destroyComment');

// index articles they have the same category 
Route::get('/articles/category/{category}', [FrontendController::class, 'ArticlesByCategory'])->name('ArticlesByCategory');

Route::get('/about', [FrontendController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontendController::class, 'sendMessage'])->name('front.sendMessage');

//registration
Route::get('/registration', [FrontendController::class, 'create'])->name('create.registration');
Route::post('/registration', [FrontendController::class, 'store'])->name('store.registration');
Route::get('/verify_email/{hash}',[FrontendController::class, 'verifyEmail']);

//reset password
Route::get('/password/reset', [LoginController::class, 'passwordReset'])->name('password.reset');
Route::post('/password/reset', [LoginController::class, 'passwordResetSendEmail'])->name('password.reset.send.email');

Route::get('/password/reset/{hash}',[LoginController::class, 'passwordEdit']);
Route::post('/password/update/{hash}',[LoginController::class, 'passwordUpdate'])->name('passwordUpdate');
