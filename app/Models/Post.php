<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'user_id',
    'prefecture_id',
    'title',
    'place',
    'about',
    'impression',
    'visited_at',
    'created_at',
    'updated_at'
    ];
    
    
    public function images()
    {
    return $this->belongsToMany(Image::class, 'image_post');
    }
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}

