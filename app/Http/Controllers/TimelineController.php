<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index(Timeline $timeline)
    {
        return $timeline->get();
    }
}
