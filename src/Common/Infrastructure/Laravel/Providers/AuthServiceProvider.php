<?php

namespace Src\Common\Infrastructure\Laravel\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot()
    {
        $this->registerPolicies();
    }

    public function register()
    {
        $this->app->bind(
            \Src\Auth\Domain\AuthInterface::class,
            \Src\Auth\Application\JWTAuth::class
        );
    }
}
