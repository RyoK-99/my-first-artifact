<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Timeline;
use App\Models\User;
use App\Models\Game;

class TimelineController extends Controller
{
    public function index(Timeline $timeline)
    {
        return view('timelines/index')->with(['timelines' => $timeline->getPaginateByLimit()]);
    }
    
    public function show(Timeline $timeline)
    {
        return view('timelines/show')->with(['timeline' => $timeline]);
    }
    
    public function create(Game $game)
    {
        return view('timelines/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Timeline $timeline)
    {
        $input = $request['timeline'];
        $timeline->user_id = Auth::id();
        $timeline->fill($input)->save();
        return redirect('/timelines/' . $timeline->id);
    }
}
