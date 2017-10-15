<?php

namespace App\Models;

class Viewer extends AbstractModel
{
    protected $fillable = [
        'post_id',
        'mac_ip',
        'browser',
    ];
}
