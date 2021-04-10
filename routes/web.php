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
 * Todas as rodas devem ter como middleware -> SetCompany
 * Esse middleware busca a empresa na URL, pelo slug ou website
 * e compartilha em todos os controllers a empresa em $request->empresa
 * sem esse middleware a empresa não será reconhecida
 */

// Home da Loja
$router->get('/', ['as' => 'index', 'middleware' => 'SetCompany', 'uses' => 'SiteController@index']);


/**
 * Routers de users
 *
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/users', ['as' => 'createUser', 'uses' => 'UserController@create']);
$router->get('/v1/users', ['as' => 'getAllUsers', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'UserController@getAll']);
$router->put('/v1/users/{id}', ['as' => 'updateUser', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'UserController@update']);
$router->get('/v1/users/{id}', [ 'as' => 'viewUser', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'UserController@getUser']);
$router->delete('/v1/users/{id}', [ 'as' => 'deleteUser', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'UserController@delete']);
// login
$router->post('/v1/login', ['as' => 'login', 'uses' => 'LoginController@login']);


/**
 * Routers da Company
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/companies', ['as' => 'createCompany', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CompanyController@create']);
$router->get('/v1/my-companies', ['as' => 'myCompanies', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CompanyController@getMyCompanies']);
$router->put('/v1/companies/{id}', ['as' => 'updateCompany', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CompanyController@update']);
$router->get('/v1/companies/{id}', ['as' => 'viewCompany', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CompanyController@getCompany']);
$router->delete('/v1/companies/{id}', ['as' => 'deleteCompany', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CompanyController@delete']);


/**
 * Rotas das categorias
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/categories', ['as' => 'createCategory', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CategoryController@create']);
$router->get('/v1/my-categories', ['as' => 'myCategories', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CategoryController@getMyCategories']);
$router->put('/v1/categories/{id}', ['as' => 'updateCategory', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CategoryController@update']);
$router->get('/v1/categories/{id}', ['as' => 'viewCategory', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CategoryController@view']);
$router->delete('/v1/categories/{id}', ['as' => 'deleteCategory', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'CategoryController@delete']);

/**
 * Rotas dos produtos
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/products', ['as' => 'createProduct', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@create']);
//$router->get('/v1/my-products', ['as' => 'myProducts', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@getMyProducts']);
$router->put('/v1/products/{id}', ['as' => 'updateProduct', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@update']);
$router->get('/v1/products/{id}', ['as' => 'viewProduct', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@view']);
$router->delete('/v1/products/{id}', ['as' => 'deleteProduct', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@delete']);
