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


$router->group(['prefix' => 'api'], function () use ($router){

    $router->get('/employee', 'EmployeeController@index');
    $router->post('/employee', 'EmployeeController@register');
    $router->put('/employee/{id}', 'EmployeeController@update');
    $router->delete('/employee/{id}', 'EmployeeController@delete');


    /*
                    // Email Changing //
    $router->patch('/employee/{id}/edit', 'EmployeeController@emailChange');
*/
                    // Password Reset //
//    $router->patch('/employee/{id}', 'EmployeeController@passwordReset');

//    $app->post('/password/email', 'PasswordController@postEmail');
//    $app->post('/password/reset/{token}', 'PasswordController@postReset');


                    // Login Auth //

//    $router->get('/employee/login', 'EmployeeController@login');


});
