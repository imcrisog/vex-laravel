<?php

namespace Src\General\User\Infrastructure\EloquentModels\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PasswordCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return bcrypt($value);
    }
}