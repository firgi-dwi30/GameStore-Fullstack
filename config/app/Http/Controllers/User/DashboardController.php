<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Game;

class DashboardController extends Controller
{
    public function index()
    {
        
        // Ambil semua game
        $games = Game::all();

        // Kirim ke view dashboard
        return view('dashboard', compact('games'));
    }
    
}
