<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('usuarioId', 'App\Modelos\Usuario\Usuario');
        Route::model('suscripcionId', 'App\Modelos\Catalogo\Suscripciones');
        Route::model('carreraId', 'App\Modelos\Cursos\Carreras');
        Route::model('cursoId', 'App\Modelos\Cursos\Curso');
        Route::model('leccionId', 'App\Modelos\Cursos\Leccion');
        Route::model('oxxoId', 'App\Modelos\MetodosPago\MetodoOxxo');

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
        $this->mapWebRoutes();
        $this->mapManagerRoutes();
        $this->mapWebappRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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

    protected function mapManagerRoutes()
    {
        Route::prefix('manager')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/manager.php'));
    }

    protected function mapWebappRoutes()
    {
        Route::prefix('app')
            ->middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/webapp.php'));
    }
}
