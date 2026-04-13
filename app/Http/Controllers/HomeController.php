<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // 🔥 CEGAH ADMIN MASUK HALAMAN USER
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.novel.index');
        }

        // ambil novel + relasi
        $novels = Novel::with(['author', 'category'])
            ->latest()
            ->get();

        // ambil kategori
        $categories = Category::orderBy('name', 'asc')->get();

        return view('users.home', [
            'novels' => $novels,
            'categories' => $categories
        ]);
    }

    public function explore()
    {
        // 🔥 CEGAH ADMIN MASUK HALAMAN USER
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.novel.index');
        }

        $novels = Novel::with(['author', 'category'])
            ->latest('updated_at')
            ->get();

        return view('users.explore', [
            'novels' => $novels
        ]);
    }

    /* ===============================
       GENRE / CATEGORY
    =============================== */

    public function genre($slug)
    {
        // 🔥 CEGAH ADMIN MASUK HALAMAN USER
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.novel.index');
        }

        $category = Category::where('slug', $slug)->firstOrFail();

        $novels = Novel::with(['author', 'category'])
            ->where('category_id', $category->id)
            ->latest()
            ->get();

        return view('users.genre', [
            'category' => $category,
            'novels' => $novels
        ]);
    }
}