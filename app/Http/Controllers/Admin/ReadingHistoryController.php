<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingHistory;

class ReadingHistoryController extends Controller
{
    public function index()
    {
        $histories = ReadingHistory::with('user', 'novel', 'chapter')
            ->latest()
            ->paginate(10);

        return view('admin.history.index', compact('histories'));
    }
}