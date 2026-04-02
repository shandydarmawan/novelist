<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FavoriteController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favorites = Favorite::with('novel')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.favorites.index', compact('favorites'));
    }

    public function toggle(Novel $novel)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('novel_id', $novel->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => Auth::id(),
                'novel_id' => $novel->id,
            ]);
        }

        return back();
    }
}
