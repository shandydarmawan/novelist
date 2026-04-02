<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Novel;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::with('novel')
            ->orderBy('novel_id')
            ->orderBy('chapter_number')
            ->get();

        return view('admin.chapter.index', compact('chapters'));
    }

    public function create()
    {
        $novels = Novel::all();
        return view('admin.chapter.create', compact('novels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'novel_id' => 'required|exists:novels,id',
            'chapter_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Chapter::create([
            'novel_id' => $request->novel_id,
            'chapter_number' => $request->chapter_number,
            'title' => $request->title,
            'content' => $request->content,
            'views' => 0,
        ]);

        return redirect()->route('admin.chapter.index')
            ->with('success', 'Chapter berhasil ditambahkan');
    }

    public function edit(Chapter $chapter)
    {
        $novels = Novel::all();
        return view('admin.chapter.edit', compact('chapter', 'novels'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'novel_id' => 'required|exists:novels,id',
            'chapter_number' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $chapter->update([
            'novel_id' => $request->novel_id,
            'chapter_number' => $request->chapter_number,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.chapter.index')
            ->with('success', 'Chapter berhasil diperbarui');
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect()->route('admin.chapter.index')
            ->with('success', 'Chapter berhasil dihapus');
    }
}
