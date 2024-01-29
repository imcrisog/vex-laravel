<?php

namespace Src\General\User\Application\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\General\User\Domain\Repositories\UserRepositoryInterface::class,
            \Src\General\User\Application\Repositories\Eloquent\UserRepository::class
        );
    }
}