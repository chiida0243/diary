<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['image'];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class,'image_post');
    }

}