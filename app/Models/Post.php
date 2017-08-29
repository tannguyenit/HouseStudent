<?php

namespace App\Models;

class Post extends AbstractModel
{
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type_id',
        'status_id',
        'price',
        'area',
        'phone_boss',
        'name_boss',
        'address',
        'township',
        'country',
        'lat',
        'lng',
        'total_view',
        'total_like',
        'tota_comment',
    ];
}
