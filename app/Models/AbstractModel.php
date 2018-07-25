<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AbstractModel extends Authenticatable
{
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
