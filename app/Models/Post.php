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
        'category_id',
        'status_id',
        'price',
        'area',
        'pin',
        'phone_boss',
        'name_boss',
        'address',
        'township',
        'township_slug',
        'country',
        'lat',
        'lng',
        'note',
        'active',
        'total_view',
        'total_like',
        'tota_comment',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class)->where('status', config('setting.active'));
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

    public function firstImages()
    {
        return $this->hasOne(Image::class);
    }

    public function features()
    {
        return $this->hasMany(Features::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public function setTotalLikeAttribute($value)
    {
        if ($value < 0) {
            $value = 0;
        }

        return $this->attributes['total_like'] = $value;
    }

    public function scopeActive($query)
    {
        return $query->where('active', config('setting.active'));
    }
}
