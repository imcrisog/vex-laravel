<?php

namespace Src\General\Club\Application\Repositories\Eloquent;

use Src\General\Club\Application\Mappers\ClubMapper;
use Src\General\Club\Domain\Model\Club;
use Src\General\Club\Domain\Repositories\ClubRepositoryInterface;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;
use Src\General\Role\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class ClubRepository implements ClubRepositoryInterface
{
    public function index(): array
    {
        $clubs = [];
        foreach (
            ClubEloquentModel::all() as $clubEloquent
        ) {
            $clubs[] = ClubMapper::fromEloquent($clubEloquent);
        }

        return $clubs;
    }

    public function show(int $club_id): Club
    {
        $clubEloquent = ClubEloquentModel::query()->findOrFail($club_id);
        return ClubMapper::fromEloquent($clubEloquent);
    }

    public function store(Club $club, int $user_id): Club
    {
        $clubEloquent = ClubMapper::toEloquent($club);
        $roleCamp = RoleEloquentModel::find(1);
        $finaluser = UserEloquentModel::find($user_id);
        $clubEloquent->role()->associate($roleCamp);
        $clubEloquent->user()->associate($finaluser);
        $clubEloquent->save();

        return ClubMapper::fromEloquent($clubEloquent);
    }

    public function update(Club $club, int $user_id): Club
    {
        $clubEloquent = ClubMapper::toEloquent($club);
        $clubEloquent->save();

        return ClubMapper::fromEloquent($clubEloquent);
    }

    public function delete(int $club_id): bool
    {
        $clubEloquent = ClubEloquentModel::query()->findOrFail($club_id);
        return $clubEloquent->delete();
    }
}