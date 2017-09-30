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

    public function getImageAttribute($value)
    {
        $path = public_path() . config('path.post') . $value;

        if (file_exists($path)) {
            return config('path.post') . $value;
        }

        return 'wp-content/uploads/2016/03/chicago-06-385x258.jpg';
    }
}
