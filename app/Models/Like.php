<?php

namespace App\Models;

class Like extends AbstractModel
{
    protected $fillable = [
        'user_id',
        'post_id',
        'status',
    ];
}
