<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


$router->group(['prefix' => 'api'], function () use ($router){

    $router->get('/employee', 'EmployeeController@index');
    $router->post('/employee', 'EmployeeController@register');
    $router->put('/employee/{id}', 'EmployeeController@update');
    $router->delete('/employee/{id}', 'EmployeeController@delete');

                    // Password Reset //
    $router->get('/send-email','EmployeeController@sendEmail');
    $router->post('/forgot-password','EmployeeController@sendResetLinkResponse');



});
