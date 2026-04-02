<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ReadHistory; // 🔥 TAMBAHAN

class LibraryController extends Controller
{
    public function index($tab = 'bookmark') 
    {
        $user = Auth::user();

        // 🔥 HISTORY (TAMBAHAN)
        if ($tab === 'history') {

            $histories = ReadHistory::with(['novel', 'chapter'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();

            return view('users.library', [
                'tab' => $tab,
                'histories' => $histories,
                'novels' => collect()
            ]);
        }

        // 🔥 READLIST (tetap kosong)
        elseif ($tab === 'readlist') {
            $novels = collect();
        }

        // 🔥 BOOKMARK (punya kamu, tidak diubah)
        else {
            $novels = $user->favorites()->latest()->get();
        }

        return view('users.library', [
            'novels' => $novels,
            'tab' => $tab,
            'histories' => collect() // biar tidak error
        ]);
    }
}