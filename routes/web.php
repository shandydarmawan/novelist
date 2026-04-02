<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserNovelController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| USER / FRONTEND
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', [HomeController::class, 'index'])
    ->name('user.home');

// EXPLORE
Route::get('/explore', [HomeController::class, 'explore'])
    ->name('user.explore');

// DETAIL NOVEL (BEBAS TANPA LOGIN)
Route::get('/novel/{novel}', [UserNovelController::class, 'show'])
    ->name('user.novel.show');

// BACA NOVEL
Route::get('/novel/{novel}/read/{chapter?}', [UserNovelController::class, 'read'])
    ->name('user.novel.read');

// GENRE
Route::get('/genre', [GenreController::class, 'index'])
    ->name('genre.index');

Route::get('/genre/{slug}', [GenreController::class, 'show'])
    ->name('genre.show');

// CATEGORY
Route::get('/category/{slug}', [CategoryController::class, 'show'])
    ->name('user.category');

// SEARCH NOVEL
Route::get('/search', [SearchController::class, 'index'])
    ->name('user.search');

Route::post('/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('review.store');


Route::delete('/review/{id}', [ReviewController::class, 'destroy'])
    ->name('review.delete');

/*
|--------------------------------------------------------------------------
| LIBRARY (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/library/{tab?}', [LibraryController::class, 'index'])
    ->name('user.library')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| FAVORITE (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // TOGGLE FAVORITE
    Route::post('/favorite/{novel}', [FavoriteController::class, 'toggle'])
        ->name('favorite.toggle');

    // LIST FAVORITE
    Route::get('/favorites', [FavoriteController::class, 'index'])
        ->name('user.favorites');
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN & REGISTER)
|--------------------------------------------------------------------------
*/
// LOGIN
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'registerForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // NOVEL
    Route::resource('novel', NovelController::class);

    // CATEGORY
    Route::resource('category', CategoryController::class);

    // AUTHOR
    Route::resource('author', AuthorController::class);

    // CHAPTER
    Route::resource('chapter', ChapterController::class);
});
