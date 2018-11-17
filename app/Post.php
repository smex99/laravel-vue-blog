<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

use Auth;

class Post extends Model
{
    use SoftDeletes;
    use Searchable;

    public static function ownerPost()
    {
        $id = Auth::User()->id;
        return static::where('user_id', $id)->get();
    }

    public function getShortcontentAttribute()
    {
        return substr($this->content, 0, random_int(140, 160)).'...';
    }

    public function SearchableAs()
    {
        return 'post_index';
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
}
