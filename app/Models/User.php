<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class User extends AbstractModel
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'birthday',
        'gender',
        'address',
        'phone',
        'provice_id',
        'active',
        'role',
        'bio',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getAvatarAttribute($value)
    {

        $path = config('path.avatar') . $value;

        if (file_exists(public_path() . $path)) {
            return $path;
        }

        return config('path.defaul-avatar');
    }
}
