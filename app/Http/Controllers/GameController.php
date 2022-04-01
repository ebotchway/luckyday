<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Prize;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        $datagame = Game::all();

        return view('game.one', compact('datagame'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Support\Collection
     */
    public function playgame_one($id)
    {
        $datagame = Game::findOrFail($id);
        $prizes = Prize::all()->where('stage', '=', '1');
        return view('game.two', compact('datagame', 'prizes'));
    }
}
