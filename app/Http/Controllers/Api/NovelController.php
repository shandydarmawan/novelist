<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * GET /api/novels
     * Ambil semua novel
     */
    public function index()
    {
        $novels = Novel::with(['category', 'author'])
            ->latest()
            ->get();

        return response()->json($novels);
    }

    /**
     * POST /api/novels
     * Tambah novel baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'author_id'   => 'required|exists:authors,id',
            'title'       => 'required|string|max:255',
            'synopsis'    => 'required',
            'content'     => 'nullable',
            'status'      => 'in:ongoing,completed,hiatus',
        ]);

        $novel = Novel::create([
            'category_id' => $request->category_id,
            'author_id'   => $request->author_id,
            'title'       => $request->title,
            'synopsis'    => $request->synopsis,
            'content'     => $request->content,
            'status'      => $request->status ?? 'ongoing',
            'views'       => 0,
            'likes'       => 0,
        ]);

        return response()->json([
            'message' => 'Novel berhasil ditambahkan',
            'data' => $novel
        ], 201);
    }

    /**
     * GET /api/novels/{id}
     * Detail novel
     */
    public function show($id)
    {
        $novel = Novel::with(['category', 'author'])->findOrFail($id);

        // tambah views
        $novel->increment('views');

        return response()->json($novel);
    }

    /**
     * PUT /api/novels/{id}
     * Update novel
     */
    public function update(Request $request, $id)
    {
        $novel = Novel::findOrFail($id);

        $request->validate([
            'title'    => 'sometimes|string|max:255',
            'synopsis' => 'sometimes',
            'content'  => 'nullable',
            'status'   => 'in:ongoing,completed,hiatus',
        ]);

        $novel->update($request->only([
            'title',
            'synopsis',
            'content',
            'status',
        ]));

        return response()->json([
            'message' => 'Novel berhasil diupdate',
            'data' => $novel
        ]);
    }

    /**
     * DELETE /api/novels/{id}
     * Hapus novel
     */
    public function destroy($id)
    {
        $novel = Novel::findOrFail($id);
        $novel->delete();

        return response()->json([
            'message' => 'Novel berhasil dihapus'
        ]);
    }
}
