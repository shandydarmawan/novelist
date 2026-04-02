<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->get();
        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('admin.author.index')
            ->with('success', 'Author berhasil ditambahkan');
    }

    public function edit(Author $author)
    {
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('admin.author.index')
            ->with('success', 'Author berhasil diperbarui');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.author.index')
            ->with('success', 'Author berhasil dihapus');
    }
}
