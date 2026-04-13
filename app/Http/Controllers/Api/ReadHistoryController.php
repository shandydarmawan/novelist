<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReadingHistory;
use Illuminate\Http\Request;

class ReadHistoryController extends Controller
{
    public function index(Request $request)
    {
        $histories = ReadingHistory::where('user_id', $request->user()->id)
            ->with([
                'novel.author',
                'novel.category',
                'chapter',
            ])
            ->latest('updated_at')
            ->get();

        $result = $histories->map(function ($h) {
            if (!$h->novel) return null;

            $novel = $h->novel->toArray();
            $novel['last_chapter'] = $h->chapter ? [
                'id'             => $h->chapter->id,
                'chapter_number' => $h->chapter->chapter_number,
                'title'          => $h->chapter->title,
            ] : null;

            return $novel;
        })->filter()->unique('id')->values();

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $request->validate([
            'novel_id'   => 'required|exists:novels,id',
            'chapter_id' => 'required|exists:chapters,id',
        ]);

        ReadingHistory::updateOrCreate(
            [
                'user_id'  => $request->user()->id,
                'novel_id' => $request->novel_id,
            ],
            [
                'chapter_id' => $request->chapter_id,
                'updated_at' => now(),
            ]
        );

        return response()->json(['message' => 'History disimpan']);
    }
}