<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NovelController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ReadlistController;
use App\Http\Controllers\Api\ReadHistoryController;
use App\Http\Controllers\ChapterController;

// ── PUBLIC ────────────────────────────────────────────────
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/novels',            [NovelController::class, 'index']);
Route::get('/novels/{id}',       [NovelController::class, 'show']);
Route::get('/categories',        [CategoryController::class, 'index']);

Route::get('/novels/{id}/chapters', [ChapterController::class, 'getByNovel']);
Route::get('/chapters/{id}',        [ChapterController::class, 'showApi']);

// ── AUTH REQUIRED ─────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Bookmark/Favorites
    Route::get('/favorites',          [FavoriteController::class, 'index']);
    Route::post('/favorites/{novelId}', [FavoriteController::class, 'toggle']);

    // Readlist
    Route::get('/readlist',            [ReadlistController::class, 'index']);
    Route::post('/readlist/{novelId}', [ReadlistController::class, 'toggle']);

    // History
    Route::get('/read-histories',  [ReadHistoryController::class, 'index']);
    Route::post('/read-histories', [ReadHistoryController::class, 'store']);
});