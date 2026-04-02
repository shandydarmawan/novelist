<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovelController extends Controller
{
    public function index()
    {
        $novels = Novel::with('category', 'author')->latest()->get();
        return view('admin.novel.index', compact('novels'));
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.novel.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
            'status'      => 'required',
            'synopsis'    => 'required',
            'content'     => 'nullable',
            'cover'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('novels', 'public');
        }

        $data['views'] = 0;
        $data['likes'] = 0;

        Novel::create($data);

        return redirect()->route('admin.novel.index')
            ->with('success', 'Novel berhasil ditambahkan');
    }

    public function show(Novel $novel)
    {
        return view('admin.novel.show', compact('novel'));
    }

    public function edit(Novel $novel)
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('admin.novel.edit', compact('novel', 'categories', 'authors'));
    }

    public function update(Request $request, Novel $novel)
    {
        $data = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
            'status'      => 'required',
            'synopsis'    => 'required',
            'content'     => 'nullable',
            'cover'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($novel->cover);
            $data['cover'] = $request->file('cover')->store('novels', 'public');
        }

        $novel->update($data);

        return redirect()->route('admin.novel.index')
            ->with('success', 'Novel berhasil diperbarui');
    }

    public function destroy(Novel $novel)
    {
        Storage::disk('public')->delete($novel->cover);
        $novel->delete();

        return back()->with('success', 'Novel berhasil dihapus');
    }
}
