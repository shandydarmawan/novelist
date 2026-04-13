<?php

namespace App\Http\Controllers;

use App\Models\Readlist;
use Illuminate\Support\Facades\Auth;

class ReadlistController extends Controller
{
    public function toggle($novelId)
    {
        $user = Auth::user();

        $exist = Readlist::where('user_id', $user->id)
            ->where('novel_id', $novelId)
            ->first();

        if ($exist) {
            $exist->delete();
        } else {
            Readlist::create([
                'user_id' => $user->id,
                'novel_id' => $novelId
            ]);
        }

        return back()->with('success', 'Readlist diperbarui');
    }
}