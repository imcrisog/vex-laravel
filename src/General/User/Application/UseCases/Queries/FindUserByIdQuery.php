<?php

namespace Src\General\User\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\General\User\Domain\Repositories\UserRepositoryInterface;
use Src\General\User\Domain\Model\User;

class FindUserByIdQuery implements QueryInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(
        private readonly int $user_id
    )
    {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    public function handle(): User
    {
        return $this->repository->findById($this->user_id);
    }
}