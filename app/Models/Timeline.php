<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'game_id',
        ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('game', 'user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
