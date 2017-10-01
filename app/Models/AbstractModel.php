<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;

class AbstractModel extends Authenticatable
{
    public $incrementing = false;

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return false;
        }

        return Carbon::now()->subSeconds(time() - strtotime($value))->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        if (empty($value)) {
            return false;
        }

        return Carbon::now()->subSeconds(time() - strtotime($value))->diffForHumans();
    }
}
