<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GameUser;
use App\Models\Game;
use App\Models\Timeline;

class UserController extends Controller
{
    protected $table = 'game_user';
    
    public function index(Request $request, User $user)
    {
        $gameusers = $user->gameuser;
        $timelines = $user->timelines;
        return view('users/index')->with(['user' => $user->first(), 'gameusers' => $gameusers, 'timelines' => $timelines]);
    }
}
