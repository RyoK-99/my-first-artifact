<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
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
}
