<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\User;
use App\Models\Game;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews/index')->with(['reviews' => $review->getPaginateByLimit()]);
    }
    
    public function show(Review $review)
    {
        return view('reviews/show')->with(['review' => $review]);
    }
    
    public function create(Game $game)
    {
        return view('reviews/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Review $review, Game $game)
    {
        $input = $request['review'];
        $review->user_id = Auth::id();
        $review->fill($input)->save();
        
        return redirect('/games/' . $game->id);
    }
    
    public function like($id)
    {
       Like::create([
           'review_id' => $id,
           'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Review.');
        
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $like = Like::where('review_id', $review->id)->where('user_id', Auth::id())->first();
        $like->delete();
        
        session()->flash('success', 'You Unliked the Review.');
        
        return redirect()->back();
    }
    
    public function delete(Review $review, Game $game)
    {
        $review->delete();
        return redirect('/games/' . $game->id);
    }
}
