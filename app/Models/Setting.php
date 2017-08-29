<?php

namespace App\Models;

class Setting extends AbstractModel
{
    protected $fillable = [
        'email',
        'copyright',
        'address',
        'phone',
        'mobile',
        'facebook',
        'google',
        'twitter',
        'logo',
        'maintenance',
    ];
}
