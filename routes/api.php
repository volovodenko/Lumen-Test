<?php

declare(strict_types = 1);

/**
 *  @var \Laravel\Lumen\Routing\Router $router
 */

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

$router->post('/sign-in', 'User\Auth\AccessController@signIn');

$router->group([
    'as'     => 'user.',
    'prefix' => 'user',
], function () use ($router) {
    $router->post('/register', 'User\Auth\RegisterController@register');
    $router->post('/recover-password', 'User\Auth\ForgotPasswordController@sendResetLinkEmail');
    $router->patch('/recover-password', 'User\Auth\ResetPasswordController@reset');
});

$router->group([
    'middleware' => 'auth',
    'as'         => 'user.',
    'prefix'     => 'user',
], function () use ($router) {
    $router->get('/companies', 'User\CompanyController@index');
    $router->post('/companies', 'User\CompanyController@add');
});
