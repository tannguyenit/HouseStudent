<?php

namespace App\Models;

class Contact extends AbstractModel
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'messages',
    ];
}
