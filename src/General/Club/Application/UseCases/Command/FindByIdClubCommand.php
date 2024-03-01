<?php

namespace Src\General\Club\Application\UseCases\Command;

use Src\Common\Domain\CommandInterface;
use Src\General\Club\Application\Exceptions\ClubDontExistsException;
use Src\General\Club\Domain\Model\Club;
use Src\General\Club\Domain\Repositories\ClubRepositoryInterface;
use Src\General\Club\Infrastructure\EloquentModels\ClubEloquentModel;

class FindByIdClubCommand implements CommandInterface
{
    private ClubRepositoryInterface $repository;

    public function __construct(
        private readonly int $club_id,
    )
    {
        $this->repository = app()->make(ClubRepositoryInterface::class);
    }

    public function execute(): Club
    {
        if (!ClubEloquentModel::query()->where('id', $this->club_id)->exists()) {
            throw new ClubDontExistsException();
        }

        return $this->repository->show($this->club_id);
    }
}