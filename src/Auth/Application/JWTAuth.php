<?php

namespace Src\Auth\Application;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Log;
use Src\Auth\Domain\AuthInterface;
use Src\General\User\Application\Mappers\UserMapper;
use Src\General\User\Domain\Repositories\UserRepositoryInterface;
use Src\General\User\Domain\Model\User;
use Src\General\User\Domain\Model\ValueObjects\Password;
use Src\General\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class JWTAuth implements AuthInterface
{
    private UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }   

    public function register(User $user, Password $password): string
    {
        $final_user = $this->user_repository->store($user, $password);
        return auth()->attempt(['email' => $final_user->email, 'password' => $password->value]);
    }

    public function login(array $credentials): string
    {
        $user = UserEloquentModel::query()->where('email', $credentials['email'])->first();

        if (!$user) {
            throw new AuthenticationException();
        }

        if (!$token = auth()->attempt($credentials)) {
            throw new AuthenticationException();
        }

        return $token;
    }

    public function refresh(): string
    {
        try {
            return FacadesJWTAuth::parseToken()->refresh();
        } catch (JWTException $e) {
            Log::error($e->getMessage());
            throw new AuthenticationException($e->getMessage());
        }
    }

    public function me(): User
    {
        return UserMapper::fromAuth(auth()->user());
    }
}