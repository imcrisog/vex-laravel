<?php

namespace Src\Auth\Domain;

use Src\General\User\Domain\Model\User;
use Src\General\User\Domain\Model\ValueObjects\Password;

interface AuthInterface 
{
    public function register(User $user, Password $password): string;

    public function login(array $credentials): string;

    public function refresh(): string;

    // public function logout(): void;

    public function me(): User;

}