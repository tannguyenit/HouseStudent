<?php

namespace App\Models;

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

    public static function transTypes($type)
    {
        if (count($type) < 2) {
            $translatedLabels = trans($type);
        } else {
            $translatedLabels = [];
            foreach ($type as $key => $label) {
                $translatedLabels[$key] = trans($label);
            }
        }

        return $translatedLabels;
    }
}
