<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        $novels = Novel::with(['author', 'category'])
            ->where('title', 'like', '%' . $q . '%')
            ->latest()
            ->get();

        return view('users.search', compact('novels', 'q'));
    }
}
