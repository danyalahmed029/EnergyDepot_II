<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}



/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

 $app->withFacades();

 $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    EnergyDepot\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    EnergyDepot\Console\Kernel::class
);

$app->singleton('filesystem', function ($app) {
    return $app->loadComponent('filesystems', 'Illuminate\Filesystem\FilesystemServiceProvider', 'filesystem');
});
$app->singleton( Illuminate\Contracts\Filesystem\Factory::class, function ($app) { return new Illuminate\Filesystem\FilesystemManager($app); } );
$app->configure('filesystems');
/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/


/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/
$app->register(EnergyDepot\Providers\AppServiceProvider::class);
$app->register(EnergyDepot\Providers\AuthServiceProvider::class);
$app->routeMiddleware([
    'auth' => EnergyDepot\Http\Middleware\Authenticate::class,
]);

$app->register(Barryvdh\Debugbar\LumenServiceProvider::class);
$app->register(Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
$app->register(Webpatser\Uuid\UuidServiceProvider::class);

// our aliases
$app->withAliases([
'Uuid' => Webpatser\Uuid\Uuid::class
]);
/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/
$app->register(Pearl\RequestValidate\RequestServiceProvider::class);
$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Arubacao\BasicAuth\BasicGuardServiceProvider::class);
$app->register(Illuminate\Session\SessionServiceProvider::class);


$app->configure('services');

$app->configure('mail');



$app->router->group([
    'namespace' => 'EnergyDepot\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});
$app->router->group([
	'namespace' => 'EnergyDepot\Http\Controllers\api\v1'
], function($router) {
	require __DIR__.'/../routes/api.php';
});

return $app;
