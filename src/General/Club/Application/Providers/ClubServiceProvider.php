<?php

namespace Src\General\Club\Application\Providers;

use Illuminate\Support\ServiceProvider;

class ClubServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\General\Club\Domain\Repositories\ClubRepositoryInterface::class,
            \Src\General\Club\Application\Repositories\Eloquent\ClubRepository::class
        );
    }
}