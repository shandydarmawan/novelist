<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Category; // ✅ TAMBAHAN
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ambil semua novel dari admin
        $novels = Novel::latest()->get();

        // ✅ TAMBAHAN: ambil semua kategori/genre
        $categories = Category::orderBy('name')->get();

        // ✅ TAMBAHKAN categories (tidak menghapus yang lama)
        return view('users.home', compact('novels', 'categories'));
    }

    public function explore()
    {
        $novels = Novel::with(['author', 'category'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('users.explore', compact('novels'));
    }

    /* ===============================
       GENRE / CATEGORY
    =============================== */
    public function genre($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $novels = Novel::where('category_id', $category->id)
            ->latest()
            ->get();

        return view('users.genre', compact('category', 'novels'));
    }
}
