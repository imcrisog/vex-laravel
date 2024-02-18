<?php

namespace Src\General\Club\Application\UseCases\Command;

use Src\Common\Domain\CommandInterface;
use Src\General\Club\Application\Exceptions\NameAlreadyUsedException;
use Src\General\Club\Domain\Model\Club;
use Src\General\Club\Domain\Repositories\ClubRepositoryInterface;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;

class StoreClubCommand implements CommandInterface
{
    private ClubRepositoryInterface $repository;

    public function __construct(
        private readonly Club $club,
        private readonly int $user_id
    )
    {
        $this->repository = app()->make(ClubRepositoryInterface::class);
    }

    public function execute(): Club
    {
        if (ClubEloquentModel::query()->where('name', $this->club->name)->exists()) {
            throw new NameAlreadyUsedException();
        }

        return $this->repository->store($this->club, $this->user_id);
    }
}