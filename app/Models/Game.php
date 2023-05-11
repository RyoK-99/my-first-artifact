<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquest\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    
    //protected $table = "users";
    
    protected $fillable = [
        'name',
        'overview',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('name', 'ASC')->paginate($limit_count);
    }
    
    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function game_user()
    {
        return $this->hasMany(GameUser::class);
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        
        $favoritepeple = array();
        if ($this->game_user) {
          foreach($this->game_user as $favorite) {
            array_push($favoritepeple, $favorite->user_id);
          }
        }
        
        if (in_array($id, $favoritepeple)) {
            return true;
        } else {
            return false;
        }
    }
}
