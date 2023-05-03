<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    
    protected $fillable = [
        'title',
        'body',
        'game_id',
        ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('game', 'user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = array();
        if ($this->likes) {
          foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
          }
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
