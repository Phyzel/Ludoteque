<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameCollection extends Controller
{
    public function add(Request $request) {
        $game = new game;
        $game->icon = $request->input('icon');
        $game->name = $request->input('name');
        $game->support = $request->input('support');

        $game->save();
    }
}
