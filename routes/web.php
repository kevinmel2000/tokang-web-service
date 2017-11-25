<?php

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

$router->group(['prefix'=>'api/v1'], function($router){    
    $router->post('/register','UsersController@register');
    $router->post('/login','LoginController@index');
    $router->group(['prefix' => 'users', 'middleware'=>'auth'], function($router){        
        $router->get('view/{id}', 'UsersController@view');
        $router->put('edit/{id}', 'UsersController@edit');
        $router->delete('delete/{id}', 'UsersController@delete');
        $router->get('index', 'UsersController@index');
    });

    $router->group(['prefix' => 'users_address', 'middleware'=>'auth'], function($router){
        $router->post('add', 'UserAddressController@add');
        $router->get('view/{id}', 'UserAddressController@view');
        $router->put('edit/{id}', 'UserAddressController@edit');
        $router->delete('delete/{id}', 'UserAddressController@delete');
        $router->get('index', 'UsersAddressController@index');
    });

    $router->group(['prefix' => 'customers', 'middleware'=>'auth'], function($router){
        $router->post('add', 'CustomersController@add');
        $router->get('view/{id}', 'CustomersController@view');
        $router->delete('delete/{id}', 'CustomersController@delete');
        $router->get('index', 'CustomersController@index');
    });
});