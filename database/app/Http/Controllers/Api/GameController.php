<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{
   public function index()
{
    $games = Game::all()->map(function ($game) {
        // Cek jika folder 'covers/' belum ada di depan nama file
        if (!str_starts_with($game->cover, 'covers/')) {
            $path = 'covers/' . ltrim($game->cover, '/');
        } else {
            $path = ltrim($game->cover, '/');
        }

        // Jika dipanggil Android (API), gunakan 10.0.2.2
        if (request()->wantsJson()) {
            $game->cover = "http://10.0.2.2:8000/" . $path;
        } 
        // Jika dipanggil Web (biasanya ditangani view, tapi ini untuk jaga-jaga)
        else {
            $game->cover = $path;
        }
        
        return $game;
    });

    return response()->json([
        'status' => true,
        'data' => $games
    ]);
}
}