<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ReadingHistory;
use App\Models\Readlist; // 🔥 TAMBAHAN

class LibraryController extends Controller
{
    public function index($tab = 'bookmark') 
    {
        $user = Auth::user();

        // 🔥 HISTORY
        if ($tab === 'history') {

            $histories = ReadingHistory::with(['novel', 'chapter'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();

            return view('users.library', [
                'tab' => $tab,
                'histories' => $histories,
                'novels' => collect()
            ]);
        }

        // 🔥 READLIST (SUDAH AKTIF)
        elseif ($tab === 'readlist') {

            $novels = Readlist::with('novel')
                ->where('user_id', $user->id)
                ->latest()
                ->get()
                ->pluck('novel'); // 🔥 ambil data novel saja
        }

        // 🔥 BOOKMARK
        else {
            $novels = $user->favorites()->latest()->get();
        }

        return view('users.library', [
            'novels' => $novels,
            'tab' => $tab,
            'histories' => collect()
        ]);
    }
}