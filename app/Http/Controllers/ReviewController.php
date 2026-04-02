<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;

class ReviewController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'novel_id' => 'required',
        'comment' => 'required',
        'rating' => 'required|integer|min:1|max:5'
    ]);

    Review::create([
        'user_id' => auth()->id(), // ✅ pakai user login
        'novel_id' => $request->novel_id,
        'comment' => $request->comment,
        'rating' => $request->rating,
        'is_manual' => true
    ]);

    return back();
}
public function destroy($id)
{
    $review = Review::findOrFail($id);

    // OPTIONAL (biar aman)
    // kalau mau hanya user tertentu:
    // if ($review->user_id != auth()->id()) {
    //     return back()->with('error', 'Tidak diizinkan!');
    // }

    $review->delete();

    return back()->with('success', 'Ulasan berhasil dihapus');
}
}
