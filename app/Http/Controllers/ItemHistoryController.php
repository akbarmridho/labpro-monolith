<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use Illuminate\Http\Request;

class ItemHistoryController extends Controller
{
    public function index()
    {
        $itemHistory = ItemHistory::paginate(10);
    }
}
