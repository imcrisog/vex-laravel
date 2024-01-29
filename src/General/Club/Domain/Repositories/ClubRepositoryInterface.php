<?php

namespace Src\General\Club\Domain\Repositories;

use Src\General\Club\Domain\Model\Club;

interface ClubRepositoryInterface
{
    public function show(int $club_id): Club;

    public function store(Club $club, int $user_id): Club;
}