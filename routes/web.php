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
 * ATENÇÂO!
 *
 * Todas as rodas devem ter como middleware -> setEmpresa
 * Esse middleware busca a empresa na URL, pelo slug ou website
 * e compartilha em todos os controllers a empresa em $request->empresa
 * sem esse middleware a empresa não será reconhecida
 */

// Home da Loja
$router->get('/', ['as' => 'index', 'middleware' => 'setEmpresa', 'uses' => 'SiteController@index']);


/**
 * Routers de users
 *
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/users', ['as' => 'createUser', 'uses' => 'UserController@create']);
$router->get('/v1/users', ['as' => 'getAllUsers', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'UserController@getAll']);
$router->put('/v1/users/{id}', ['as' => 'updateUser', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'UserController@update']);
$router->get('/v1/users/{id}', [ 'as' => 'viewUser', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'UserController@getUser']);
$router->delete('/v1/users/{id}', [ 'as' => 'deleteUser', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'UserController@delete']);
// login
$router->post('/v1/login', ['as' => 'login', 'uses' => 'LoginController@login']);


/**
 * Routers da Company
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/companies', ['as' => 'createCompany', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'EmpresaController@create']);
$router->get('/v1/my-companies', ['as' => 'myCompanies', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'EmpresaController@getMyCompanies']);
$router->put('/v1/companies/{id}', ['as' => 'updateEmpresa', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'EmpresaController@update']);
$router->get('/v1/companies/{id}', ['as' => 'viewCompany', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'EmpresaController@getCompany']);
$router->delete('/v1/companies/{id}', ['as' => 'deleteCompany', 'middleware' => ['auth', 'setEmpresa'], 'uses' => 'EmpresaController@delete']);


