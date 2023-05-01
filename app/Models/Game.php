<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
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
        return $this->hasMany(Reviews::class);
    }
}
