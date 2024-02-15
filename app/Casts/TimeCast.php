<?php

namespace App\Casts;

use App\ValueObjects\Cal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TimeCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return Cal::time($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        if ($value instanceof Cal) {
            if (empty($value->value)) {
                return null;
            }

            return $value->value;
        }

        return $value;
    }
}
