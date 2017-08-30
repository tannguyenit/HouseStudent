<?php

namespace App\Models;

class Status extends AbstractModel
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
