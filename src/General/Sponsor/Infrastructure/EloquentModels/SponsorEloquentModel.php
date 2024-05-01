<?php

namespace Src\General\Sponsor\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;
use Src\General\Role\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class SponsorEloquentModel extends Model
{

    protected $table = 'sponsors';

    // protected $casts = [
    //     'password' => PasswordCast::class
    // ];

    // protected $fillable = [];

    public function users()
    {
        return $this->belongsToMany(UserEloquentModel::class);
    }

    public function role()
    {
        return $this->belongsTo(RoleEloquentModel::class);
    }

}