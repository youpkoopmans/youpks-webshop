<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;
use LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const DASHBOARD = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapBackendRoutes();

        $this->mapFrontendRoutes();

        //
    }

    protected function mapBackendRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix(LaravelLocalization::setLocale())
            ->group(route_backend('backend.php'));
    }

    protected function mapFrontendRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix(LaravelLocalization::setLocale())
            ->group(route_frontend('frontend.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
