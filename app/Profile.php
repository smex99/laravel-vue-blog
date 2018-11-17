<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'address', 'city', 'country', 'postal_code', 'image',
    ];

    public function User()
    {
    	return $this->belongsTo(User::class);
    }
}
