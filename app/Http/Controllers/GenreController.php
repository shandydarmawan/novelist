<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // HALAMAN LIST GENRE
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('users.genre.index', compact('categories'));
    }

    // HALAMAN NOVEL PER GENRE
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $novels = $category->novels()
            ->latest()
            ->get();
        $categories = Category::orderBy('name')->get(); 

    return view('users.genre.show', compact('category', 'novels', 'categories'));
    }
}
