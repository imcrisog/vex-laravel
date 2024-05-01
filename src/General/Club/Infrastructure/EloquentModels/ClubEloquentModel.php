<?php

namespace Src\General\Club\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;
use Src\General\Player\Infrastructure\EloquentModels\PlayerEloquentModel;
use Src\General\Role\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class ClubEloquentModel extends Model
{

    protected $table = 'clubs';

    // protected $casts = [
    //     'password' => PasswordCast::class
    // ];

    // protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(UserEloquentModel::class);
    }

    public function players()
    {
        return $this->hasMany(PlayerEloquentModel::class);
    }

    public function role()
    {
        return $this->belongsTo(RoleEloquentModel::class);
    }

}