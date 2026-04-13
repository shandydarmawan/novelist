<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Novel;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = $request->user()
            ->favorites()
            ->with(['category', 'author'])
            ->get();

        return response()->json($favorites);
    }

    public function toggle(Request $request, $novelId)
    {
        $user = $request->user();
        $result = $user->favorites()->toggle($novelId);

        $added = count($result['attached']) > 0;

        return response()->json([
            'status'  => $added ? 'added' : 'removed',
            'message' => $added ? 'Ditambahkan ke favorit' : 'Dihapus dari favorit',
        ]);
    }
}