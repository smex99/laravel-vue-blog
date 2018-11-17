<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
