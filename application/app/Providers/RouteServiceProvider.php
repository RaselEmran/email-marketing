<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $usersNamespace = 'App\Http\Controllers\Users';
    protected $activityNamespace = 'App\Http\Controllers\Activity';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $router->model('users', 'App\User');
        $router->model('email-list', 'App\Models\Group\Group');
        $router->model('template', 'App\Models\Template\Template');
        $router->model('history', 'App\Models\EmailHistory\EmailHistory');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
          //users
        $router->group(['namespace' => $this->usersNamespace], function ($router) {
            require app_path('Http/Routes/users.php');
        });

        //activities
        $router->group(['namespace' => $this->activityNamespace], function ($router) {
            require app_path('Http/Routes/activities.php');
        });
    }
}
