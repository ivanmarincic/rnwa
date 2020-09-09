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

use Illuminate\Support\Facades\View;

$router->get('/', function () use ($router) {
    return View::make('pages.home');
});
//CUSTOMERS
$router->get('/customers', 'CustomersController@index');
$router->get('/customers/add', 'CustomersController@add');
$router->post('/customers/add', 'CustomersController@add');
$router->get('/customers/edit/{id}', 'CustomersController@edit');
$router->post('/customers/edit/{id}', 'CustomersController@edit');
$router->post('/customers/delete', 'CustomersController@delete');
//EMPOYEES
$router->get('/employees', 'EmployeesController@index');
$router->get('/employees/add', 'EmployeesController@add');
$router->post('/employees/add', 'EmployeesController@add');
$router->get('/employees/edit/{id}', 'EmployeesController@edit');
$router->post('/employees/edit/{id}', 'EmployeesController@edit');
$router->post('/employees/delete', 'EmployeesController@delete');
