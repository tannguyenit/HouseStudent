<?php

namespace App\Models;

class Image extends AbstractModel
{
    protected $fillable = [
        'post_id',
        'image',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
