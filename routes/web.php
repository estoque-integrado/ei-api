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
$router->get('/v1/product/{idOrSlug}', ['as' => 'index', 'middleware' => 'SetCompany', 'uses' => 'SiteController@viewProduct']);

// Adicionar produto ao carrinho
$router->post('/v1/cart', ['as' => 'addCartItem', 'middleware' => ['auth', 'SetCompany'], 'uses' =>'CartController@addCartItem']);
$router->post('/v1/cart/sum', ['as' => 'sumCartItem', 'middleware' => ['auth', 'SetCompany'], 'uses' =>'CartController@sumCartItem']);
$router->post('/v1/cart/reduce', ['as' => 'reduceCartItem', 'middleware' => ['auth', 'SetCompany'], 'uses' =>'CartController@reduceCartItem']);
$router->delete('/v1/cart/{id}', ['as' => 'deleteCartItem', 'middleware' => ['auth', 'SetCompany'], 'uses' =>'CartController@deleteCartItem']);


// Pedidos
$router->post('/v1/checkout', ['as' => 'checkout', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'OrderController@checkout']);


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
$router->put('/v1/products/{id}', ['as' => 'updateProduct', 'uses' => 'ProductController@update']);
$router->get('/v1/products/{idOrSlug}', ['as' => 'viewProduct', 'middleware' => ['SetCompany'], 'uses' => 'ProductController@view']);
$router->delete('/v1/products/{id}', ['as' => 'deleteProduct', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ProductController@delete']);

/**
 * Routers do endereço
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/address', ['as' => 'createAddress', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'AddressController@create']);
//$router->get('/v1/my-address', ['as' => 'myAddress', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'AddressController@getMyCompanies']);
$router->put('/v1/address/{id}', ['as' => 'updateAddress', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'AddressController@update']);
$router->get('/v1/address/{id}', ['as' => 'viewAddress', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'AddressController@view']);
$router->delete('/v1/address/{id}', ['as' => 'deleteAddress', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'AddressController@delete']);

/**
 * Routers do Cores
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/colors', ['as' => 'createColor', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ColorController@create']);
//$router->get('/v1/my-colors', ['as' => 'myColor', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ColorController@getMyCompanies']);
$router->put('/v1/colors/{id}', ['as' => 'updateColor', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ColorController@update']);
$router->get('/v1/colors/{id}', ['as' => 'viewColor', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ColorController@view']);
$router->delete('/v1/colors/{id}', ['as' => 'deleteColor', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'ColorController@delete']);

/**
 * Routers do Tamanhos
 * @TODO Mudar para arquivo proprio
 */
$router->post('/v1/sizes', ['as' => 'createSize', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'SizeController@create']);
//$router->get('/v1/my-sizes', ['as' => 'mySize', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'SizeController@getMyCompanies']);
$router->put('/v1/sizes/{id}', ['as' => 'updateSize', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'SizeController@update']);
$router->get('/v1/sizes/{id}', ['as' => 'viewSize', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'SizeController@view']);
$router->delete('/v1/sizes/{id}', ['as' => 'deleteSize', 'middleware' => ['auth', 'SetCompany'], 'uses' => 'SizeController@delete']);


$router->get('/migrar-estoque', function() {
    $products = \App\Models\Product::all();

    foreach ($products as $product) {

        if (count($product->estoque_old) > 0) {

            foreach ($product->estoque_old as $estoqueOld) {
//                return $estoqueOld;
                $stock = new \App\Models\Stock();
                $stock->quantidade = $estoqueOld->quantidade;
                $stock->produto_id = $estoqueOld->produto_id;
                $stock->cor_id = $estoqueOld->cor_id;
                $stock->tamanho_id = $estoqueOld->tamanho_id;
                $stock->tamanho_id = $estoqueOld->tamanho_id;
                $stock->sku = $product->sku;
                $stock->peso = $product->peso;
                $stock->altura = $product->altura;
                $stock->largura = $product->largura;
                $stock->comprimento = $product->comprimento;
                $stock->diametro = $product->diametro;
                $stock->valor_venda = $estoqueOld->valor_venda == null ? $product->preco_venda : $estoqueOld->valor_venda;

                if (count($product->variacao) > 0) {
                    $stock->sku = '';
//                    return $estoqueOld;
//                    return $product->variacao;
                    foreach ($product->variacao as $variacao) {

                        if ($variacao->sizes && count($variacao->sizes) > 0) {
                            foreach ($variacao->sizes as $size) {
                                $stockSize = clone $stock;
                                $stockSize->tamanho_id = $size->id;
                                $stockSize->sku = $variacao->sku;
                                $stockSize->valor_venda = $variacao->valor_venda;
                                $stockSize->valor_custo = $variacao->valor_custo;
                                $stockSize->valor_promocional = $variacao->valor_promocional;
                                $stockSize->quantidade = $estoqueOld->quantidade;
                                $stockSize->altura = $variacao->altura;
                                $stockSize->largura = $variacao->largura;
                                $stockSize->comprimento = $variacao->comprimento;
                                $stockSize->peso = $variacao->peso;
                                $stockSize->save();
                            }
                        }
                    }
                } else {
                    $stock->save();
                }
            }
        }
    }
    return 'dados migrados!!';
//    $estoque = \App\Models\Estoque;
});
