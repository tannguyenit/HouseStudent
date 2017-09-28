<?php

namespace App\Models;

class Features extends AbstractModel
{
    protected $fillable = [
        'post_id',
        'title',
        'value',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
