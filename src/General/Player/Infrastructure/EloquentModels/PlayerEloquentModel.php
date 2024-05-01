<?php

namespace Src\General\Player\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;
use Src\General\Role\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class PlayerEloquentModel extends Model
{

    protected $table = 'players';

    // protected $casts = [
    //     'password' => PasswordCast::class
    // ];

    // protected $fillable = [];

    public function role()
    {
        return $this->belongsTo(RoleEloquentModel::class);
    }

    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    public function club()
    {
        return $this->belongsTo(ClubEloquentModel::class);
    }


}