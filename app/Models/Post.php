<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends AbstractModel
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'type_id',
        'status_id',
        'price',
        'area',
        'phone_boss',
        'name_boss',
        'address',
        'township',
        'township_slug',
        'country',
        'lat',
        'lng',
        'note',
        'status',
        'total_view',
        'total_like',
        'tota_comment',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function viewsers()
    {
        return $this->hasMany(Viewer::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function features()
    {
        return $this->hasMany(Features::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
