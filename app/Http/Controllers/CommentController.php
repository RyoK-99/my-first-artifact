<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Timeline;
use App\Models\User;

class CommentController extends Controller
{
    
    public function store(CommentRequest $request, Comment $comment, Timeline $timeline)
    {
        // $input = $request['comment'];
        $comment->body = $request['comment'];
        $comment->user_id = Auth::id();
        $comment->timeline_id = $timeline->id;
        $comment->save();
        
        
        return redirect('/timelines/' .$timeline->id);
    }
}
