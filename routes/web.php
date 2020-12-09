<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/**
 * @param string $name
 * @param string|null $controller
 */
function resource($router, string $name, $controller = null)
{
    if (!$controller) {
        $controller = ucfirst($name) . 'Controller';
    }
    $router->get("{$name}s",         "{$controller}@index");
    $router->post("{$name}s",         "{$controller}@create");
    $router->get("{$name}s/{id}",    "{$controller}@show");
    $router->put("{$name}s/{id}",    "{$controller}@update");
    $router->delete("{$name}s/{id}",    "{$controller}@delete");
}

$router->group(['prefix' => 'api/v1', 'namespace' => 'ApiControllers'], function () use ($router) {
    $router->get("token", "JwtTokenController@create");
    $router->post("job_import", "JobController@import");
    $router->group(['middleware' => 'auth'], function () use ($router) {
        resource($router, 'user');
        resource($router, 'job');
    });
    $router->get("ping", function () {
        return 'pong';
    });
});
