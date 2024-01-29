<?php

namespace Src\Common\Infrastructure\Laravel\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('internal_api')
                ->group(function() {
                    require base_path('src/General/User/Presentation/HTTP/routes.php');
                    require base_path('src/Auth/Presentation/HTTP/routes.php');
                    require base_path('src/General/Club/Presentation/HTTP/routes.php');
                    // require base_path('src/General/League/Presentation/HTTP/routes.php');
                    // require base_path('src/General/Player/Presentation/HTTP/routes.php');
                    // require base_path('src/General/Sponsor/Presentation/HTTP/routes.php');
                });
        });
    }

    private function configureRateLimiting()
    {
        RateLimiter::for('internal_api', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }
}
