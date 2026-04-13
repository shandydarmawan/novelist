<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Novel;

class NovelController extends Controller
{
    public function index()
    {
        $query = Novel::with(['author', 'category', 'categories'])->latest();

        // Filter by category (support many-to-many)
        if (request()->has('category_id')) {
            $categoryId = request('category_id');
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            })->orWhere('category_id', $categoryId);
        }

        return response()->json($query->get());
    }

    public function show($id)
    {
        $novel = Novel::with([
            'author',
            'category',
            'categories',
            'chapters' => function ($q) {
                $q->orderBy('chapter_number')->select(
                    'id', 'novel_id', 'chapter_number', 'title', 'views'
                );
            }
        ])->findOrFail($id);

        $novel->increment('views');

        return response()->json($novel);
    }
}