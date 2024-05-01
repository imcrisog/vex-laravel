<?php

namespace Src\General\Club\Application\UseCases\Command;

use Src\Common\Domain\CommandInterface;
use Src\General\Club\Domain\Repositories\ClubRepositoryInterface;

class AllClubCommand implements CommandInterface
{
    private ClubRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = app()->make(ClubRepositoryInterface::class);
    }

    public function execute(): array
    {
        return $this->repository->index();
    }
}