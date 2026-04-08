<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NovelController;
use App\Http\Controllers\ChapterController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/novels', [NovelController::class, 'index']);
Route::get('/novels/{id}', [NovelController::class, 'show']);

Route::get('/novels/{id}/chapters', [ChapterController::class, 'getByNovel']);
Route::get('/chapters/{id}', [ChapterController::class, 'showApi']);    