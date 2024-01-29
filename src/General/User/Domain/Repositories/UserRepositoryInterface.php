<?php

namespace Src\General\User\Domain\Repositories;

use Src\General\User\Domain\Model\User;
use Src\General\User\Domain\Model\ValueObjects\Email;
use Src\General\User\Domain\Model\ValueObjects\Password;

interface UserRepositoryInterface
{
    public function findById(string $user_id): User;

    public function findByEmail(Email $email): User;

    public function store(User $user, Password $password): User;
}