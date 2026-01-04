<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'developer' => 'required',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genres' => 'array',
            'modes' => 'array',
            'platforms' => 'array',
        ]);

        $data['genres'] = $request->genres ?? [];
        $data['modes'] = $request->modes ?? [];
        $data['platforms'] = $request->platforms ?? [];

        // --- BAGIAN PERBAIKAN UPLOAD ---
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan langsung ke folder public/covers
            $file->move(public_path('covers'), $filename);
            
            // Simpan hanya nama filenya saja ke DB
            $data['cover'] = $filename;
        }

        Game::create($data);
        
        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'title' => 'required',
            'developer' => 'required',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genres' => 'array',
            'modes' => 'array',
            'platforms' => 'array',
        ]);

        $data['genres'] = $request->genres ?? [];
        $data['modes'] = $request->modes ?? [];
        $data['platforms'] = $request->platforms ?? [];

        // --- BAGIAN PERBAIKAN UPLOAD ---
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Pindahkan ke public/covers
            $file->move(public_path('covers'), $filename);
            
            $data['cover'] = $filename;
        }

        $game->update($data);

        return redirect()->route('games.index')->with('success', 'Game berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Game::destroy($id);
        return redirect()->route('games.index');
    }
}