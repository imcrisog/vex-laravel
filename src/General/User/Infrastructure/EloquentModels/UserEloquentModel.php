<?php

namespace Src\General\User\Infrastructure\EloquentModels;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Src\General\User\Infrastructure\EloquentModels\Casts\PasswordCast;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserEloquentModel extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens;

    protected $table = 'users';

    protected $casts = [
        'password' => PasswordCast::class
    ];

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}