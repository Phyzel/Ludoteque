<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\game;

class GameCollection extends Controller
{

    public function index(Request $request) {
        $game = \App\game::all();
        return view('collection', ['game' => $game]);
    }

    public function add(Request $request) {
        $game = new game;
        $game->idgame = $request->input('id');
        $game->name = $request->input('name');
        $game->support = $request->input('platform');

        $game->save();

        $game = \App\game::all();
        return view('collection', ['games' => $game]);
    }

    public function delete(Request $request) {
        $game = \App\game::where($game->idgame == $request->input('id'));
        $game->delete();
    }
}
