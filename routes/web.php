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
$router->post('/v1/users', ['as' => 'createUser', 'uses' => 'UserController@create']);
$router->get('/v1/users', ['as' => 'getAllUsers', 'middleware' => 'auth', 'uses' => 'UserController@getAll']);
$router->put('/v1/users/{id}', ['as' => 'updateUser', 'middleware' => 'auth', 'uses' => 'UserController@update']);
$router->get('/v1/users/{id}', [ 'as' => 'viewUser', 'middleware' => 'auth', 'uses' => 'UserController@getUser']);
$router->delete('/v1/users/{id}', [ 'as' => 'deleteUser', 'middleware' => 'auth', 'uses' => 'UserController@delete']);
// login
$router->post('/v1/login', ['as' => 'login', 'uses' => 'LoginController@login']);


/**
 * Routers da Empresa
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/companies', ['as' => 'createCompany', 'middleware' => 'auth', 'uses' => 'EmpresaController@create']);
$router->get('/v1/my-companies', ['as' => 'myCompanies', 'middleware' => 'auth', 'uses' => 'EmpresaController@getMyCompanies']);
$router->put('/v1/companies/{id}', ['as' => 'updateEmpresa', 'middleware' => 'auth', 'uses' => 'EmpresaController@update']);
$router->get('/v1/companies/{id}', ['as' => 'viewCompany', 'middleware' => 'auth', 'uses' => 'EmpresaController@getCompany']);
$router->delete('/v1/companies/{id}', ['as' => 'deleteCompany', 'middleware' => 'auth', 'uses' => 'EmpresaController@delete']);
