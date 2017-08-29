<?php

namespace App\Models;

class Image extends AbstractModel
{
    public $incrementing = false;

    protected $fillable = [
        'post_id',
        'image',
    ];
}
