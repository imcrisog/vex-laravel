<?php

namespace Src\General\Club\Application\Mappers;

use Illuminate\Http\Request;
use Src\General\Club\Domain\Model\Club;
use Src\General\Club\Domain\Model\ValueObjects\Logo;
use Src\General\Club\Domain\Model\ValueObjects\Name;
use Src\General\Club\Domain\Model\ValueObjects\Stadium;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;

class ClubMapper 
{
    
    public static function fromRequest(Request $request, int $user_id, int $club_id = null): Club
    {
        return new Club(
            id: $club_id,
            name: new Name($request->name),
            coins: null,
            logo: new Logo($request->logo),
            level: null,
            grl: null,
            stadium: new Stadium($request->stadium),
            role_id: null,
            user_id: $user_id,
            league_id: null,
        );
    }

    public static function fromEloquent(ClubEloquentModel $clubEloquentModel): Club
    {
        return new Club(
            id: $clubEloquentModel->id,
            name: new Name($clubEloquentModel->name),
            coins: $clubEloquentModel->coins,
            logo: new Logo($clubEloquentModel->logo),
            level: $clubEloquentModel->level,
            grl: $clubEloquentModel->grl,
            stadium: new Stadium($clubEloquentModel->stadium),
            role_id: $clubEloquentModel->role_id,
            user_id: $clubEloquentModel->user_id,
            league_id: $clubEloquentModel->league_id
        );
    }

    public static function toEloquent(Club $club): ClubEloquentModel
    {
        $clubEloquentModel = new ClubEloquentModel();

        if ($clubEloquentModel->id) {
            $clubEloquentModel = ClubEloquentModel::query()->findOrFail($club->id);
        }

        $clubEloquentModel->name = $club->name;
        $clubEloquentModel->logo = $club->logo;
        $clubEloquentModel->stadium = $club->stadium;

        return $clubEloquentModel;
    }
}