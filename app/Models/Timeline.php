<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timeline extends Model
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
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
