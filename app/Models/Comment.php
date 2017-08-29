<?php

namespace App\Models;

class Comment extends AbstractModel
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];
}
