<?php

namespace App\Models;

class Type extends AbstractModel
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
