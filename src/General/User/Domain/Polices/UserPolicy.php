<?php

namespace Src\General\User\Domain\Polices;

use Src\General\User\Domain\Model\User;

class UserPolicy
{
    public static function update(User $user): bool
    {
        return auth()->user()?->id == $user->id;
    }
}