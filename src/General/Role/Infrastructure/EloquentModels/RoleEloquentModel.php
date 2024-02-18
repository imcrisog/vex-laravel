<?php

namespace Src\General\Role\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;

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
}