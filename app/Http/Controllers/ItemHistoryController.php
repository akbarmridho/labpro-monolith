<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use Illuminate\Http\Request;

class ItemHistoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $itemHistory = ItemHistory::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('history', [
            'histories' => $itemHistory
        ]);
    }
}
