<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    public function index(Game $game)
    {
        return view('games/index')->with(['games' => $game->getPaginateByLimit()]);
    }
    
    public function show(Game $game)
    {
        $reviews = $game->reviews;
        
        return view('games/show')->with(['game' => $game, 'reviews' => $reviews]);
    }
    
    public function create()
    {
        return view('games/create');
    }
    
    public function store(GameRequest $request, Game $game)
    {
        $input = $request['game'];
        $game->fill($input)->save();
        return redirect('/games/' . $game->id);
    }
    
    public function edit(Game $game)
    {
        return view('games/edit')->with(['game' => $game]);
    }
    
    public function update(GameRequest $request, Game $game)
    {
        $input_game = $request['game'];
        $game->fill($input_game)->save();
        return redirect('/games/' . $game->id);
    }
    
    public function favorite($id)
    {
        GameUser::create([
           'game_id' => $id,
           'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'Your favorite.');
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $favorite = GameUser::where('game_id', $id)->where('user_id', Auth::id())->first();
        $favorite->delete();

        session()->flash('success', 'Lift.');

        return redirect()->back();
    }
}
