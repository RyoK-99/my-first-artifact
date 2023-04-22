<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        $comment->user_id = Auth::id();
        $comment->fill($input)->save();
    }
}
