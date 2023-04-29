<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TimelineRequest;
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
        $comments = $timeline->comments;
        return view('timelines/show')->with(['timeline' => $timeline, 'comments' => $comments]);
    }
    
    public function create(Game $game)
    {
        return view('timelines/create')->with(['games' => $game->get()]);
    }
    
    public function store(TimelineRequest $request, Timeline $timeline)
    {
        $input = $request['timeline'];
        $timeline->user_id = Auth::id();
        $timeline->fill($input)->save();
        return redirect('/timelines/' . $timeline->id);
    }
    
    public function delete(Timeline $timeline)
    {
        $timeline->delete();
        return redirect('/');
    }
}
