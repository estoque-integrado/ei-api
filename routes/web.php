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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


/**
 * Routers de users
 * 
 * @TODO Mudar para arquivo proprio
 */
$router->post('/users', ['uses' => 'UserController@create']);
$router->get('/users', ['middleware' => 'auth', 'uses' => 'UserController@getAll']);
$router->put('/users', ['middleware' => 'auth', 'uses' => 'UserController@update']);
$router->delete('/users/{id}', ['middleware' => 'auth', 'uses' => 'UserController@delete']);
// login
$router->post('/login', ['uses' => 'LoginController@login']);