<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadlistController extends Controller
{
    public function index(Request $request)
    {
        $novels = $request->user()
            ->readlist()
            ->with(['category', 'author'])
            ->get();

        return response()->json($novels);
    }

    public function toggle(Request $request, $novelId)
    {
        $user = $request->user();
        $result = $user->readlist()->toggle($novelId);

        $added = count($result['attached']) > 0;

        return response()->json([
            'status'  => $added ? 'added' : 'removed',
            'message' => $added ? 'Ditambahkan ke Readlist' : 'Dihapus dari Readlist',
        ]);
    }
}