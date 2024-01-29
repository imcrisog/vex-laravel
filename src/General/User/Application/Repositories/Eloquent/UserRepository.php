<?php

namespace Src\General\User\Application\Repositories\Eloquent;

use Src\General\User\Application\Mappers\UserMapper;
use Src\General\User\Domain\Repositories\UserRepositoryInterface;
use Src\General\User\Domain\Model\User;
use Src\General\User\Domain\Model\ValueObjects\Email;
use Src\General\User\Domain\Model\ValueObjects\Password;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserRepository implements UserRepositoryInterface
{
    public function findById(string $user_id): User
    {
        $user_eloquent = UserEloquentModel::query()->findOrFail($user_id);
        return UserMapper::fromEloquent($user_eloquent);
    }

    public function findByEmail(Email $email): User
    {
        $user_eloquent = UserEloquentModel::query()->where('email', $email)->firstOrFail();
        return UserMapper::fromEloquent($user_eloquent);
    }

    public function store(User $user, Password $password): User
    {
        $user_eloquent = UserMapper::toEloquent($user);
        $user_eloquent->password = $password->value;
        $user_eloquent->save();

        return UserMapper::fromEloquent($user_eloquent);
    }
}