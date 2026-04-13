<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use App\Models\ReadingHistory; // ✅ BENAR

class UserNovelController extends Controller
{
    /**
     * HOME / BERANDA
     */
    public function index()
    {
        $novels = Novel::with(['author', 'category'])
            ->latest()
            ->get();

        return view('users.home', compact('novels'));
    }

    /**
     * DETAIL NOVEL
     */
    public function show(Novel $novel)
    {
        $novel->load('chapters');

        $isFavorite = auth()->check()
            ? auth()->user()
                ->favorites()
                ->where('novel_id', $novel->id)
                ->exists()
            : false;

        return view('users.novel.show', compact('novel', 'isFavorite'));
    }

    /**
     * BACA CHAPTER
     */
    public function read(Novel $novel, Chapter $chapter = null)
    {
        $novel->load('chapters');

        if (!$chapter) {
            $chapter = $novel->chapters
                ->sortBy('chapter_number')
                ->first();
        }

        if (!$chapter) {
            abort(404, 'Chapter belum tersedia');
        }

     
// 🔥 SIMPAN HISTORY
if (auth()->check()) {
    ReadingHistory::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'novel_id' => $novel->id
        ],
        [
            'chapter_id' => $chapter->id
        ]
    );
}

        $prev = $novel->chapters
            ->where('chapter_number', '<', $chapter->chapter_number)
            ->sortByDesc('chapter_number')
            ->first();

        $next = $novel->chapters
            ->where('chapter_number', '>', $chapter->chapter_number)
            ->sortBy('chapter_number')
            ->first();

        return view('users.novel.read', compact(
            'novel',
            'chapter',
            'prev',
            'next'
        ));
    }
}