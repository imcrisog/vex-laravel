<?php

namespace Src\General\User\Application\Mappers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Src\General\User\Domain\Model\User;
use Src\General\User\Domain\Model\ValueObjects\Email;
use Src\General\User\Domain\Model\ValueObjects\Name;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserMapper
{
    public static function fromRequest(Request $request, ?int $user_id = null): User
    {
        return new User(
            id: $user_id,
            name: new Name($request->name),
            email: new Email($request->email)
        );
    }

    public static function fromAuth(Authenticatable $user_eloquent): User
    {
        return new User(
            id: $user_eloquent->id,
            name: new Name($user_eloquent->name),
            email: new Email($user_eloquent->email)
        );
    }

    public static function fromEloquent(UserEloquentModel $user_eloquent): User
    {
        return new User(
            id: $user_eloquent->id,
            name: new Name($user_eloquent->name),
            email: new Email($user_eloquent->email)
        );
    }

    public static function toEloquent(User $user): UserEloquentModel
    {
        $new_user = new UserEloquentModel();

        $new_user->name = $user->name;
        $new_user->email = $user->email;

        return $new_user;
    }
}