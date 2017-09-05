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

    public function getLogoAttribute($value)
    {

        $path = config('path.logo') . $value;

        if (file_exists(public_path() . $path)) {
            return $path;
        }

        return config('path.no-image');
    }
}
