<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GameUser;
use App\Models\User;
use App\Models\Game;

class GameUserController extends Controller
{
    public function store(Request $request)
    {
        $gameuser = new GameUser;
        $gameuser->game_id = $request->game_id;
        $gameuser->user_id = Auth::user()->id;
        $gameuser->save();
        
        return redirect('/games/' . $gameuser->id);
    }
    
    public function destroy(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        
        $gameuser = GameUser::where('game_id', $game->id)->where('user_id', Auth::user()->id)->first();
        
        if ($gameuser)
        {
            $gameuser->delete();
        }
        
        return redirect('/games/' . $game->id);
    }
}
