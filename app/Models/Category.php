<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Category extends AbstractModel
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
