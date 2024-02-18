<?php

namespace Src\General\Club\Domain\Policies;

use Src\General\Club\Domain\Model\Club;

class ClubPolicy
{
    public static function update(Club $club)
    {
        return auth()->user()?->id == $club->user_id;
    }

    public static function delete(Club $club)
    {
        return auth()->user()?->id == $club->user_id;
    }
}