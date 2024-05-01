<?php

namespace Src\General\Role\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;
use Src\General\Player\Infrastructure\EloquentModels\PlayerEloquentModel;
use Src\General\Sponsor\Infrastructure\EloquentModels\SponsorEloquentModel;

class RoleEloquentModel extends Model
{
    use HasFactory;

    protected $table = 'roles';

    // protected $casts = [
    //     'password' => PasswordCast::class
    // ];

    // protected $fillable = [];

    public function clubs()
    {
        return $this->hasMany(ClubEloquentModel::class);
    }

    public function players()
    {
        return $this->hasMany(PlayerEloquentModel::class);
    }

    public function sponsors()
    {
        return $this->hasMany(SponsorEloquentModel::class);
    }
}