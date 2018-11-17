<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Comment extends Model
{
    public static function ownerComment()
    {
        $id = Auth::User()->id;
        return static::where('user_id', $id)->get();
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
