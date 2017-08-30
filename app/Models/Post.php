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
}
