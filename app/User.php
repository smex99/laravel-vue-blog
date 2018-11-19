<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Middleware function for checking if user has the role to access resource.
     *
    */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Middleware function for checking if user has a specifique role to access resource.
     *
    */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    // Checking if the user has a profile registred
    public function hasProfile()
    {
        //
    }

    /**
     * User model relations
     *
    */
    public function Profile()
    {
        return $this->HasOne(Profile::class);
    }

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function Roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
}
