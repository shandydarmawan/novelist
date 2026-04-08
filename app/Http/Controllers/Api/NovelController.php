<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Novel;

class NovelController extends Controller
{
    public function index()
    {
        return response()->json(
            Novel::with(['author', 'category'])->latest()->get()
        );
    }

    public function show($id)
    {
        $novel = Novel::with(['author', 'category', 'chapters'])
            ->findOrFail($id);

        $novel->increment('views');

        return response()->json($novel);
    }
}