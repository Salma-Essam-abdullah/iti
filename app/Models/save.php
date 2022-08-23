<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('created_at', 'DESC');
    }
    public function posts(){

        return $this->belongsTo(Post::class);

    }

    public function savedimages()

    {

     return $this->hasMany('App\Models\SavedImages');

    }
}
