<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;

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
    
    public function create()
    {
        return view('timelines/create');
    }
    
    public function store(Request $request, Timeline $timeline)
    {
        $input = $request['timeline'];
        $timeline->fill($input)->save();
        return redirect('/timelines/' . $timeline->id);
    }
}
