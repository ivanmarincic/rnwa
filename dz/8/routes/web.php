<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\View;

$router->group(['middleware' => 'auth.basic'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return View::make('pages.home');
    });
//CUSTOMERS
    $router->get('/customers', [CustomersController::class, 'index']);
    $router->get('/customers/add', [CustomersController::class, 'add']);
    $router->post('/customers/add', [CustomersController::class, 'add']);
    $router->get('/customers/edit/{id}', [CustomersController::class, 'edit']);
    $router->post('/customers/edit/{id}', [CustomersController::class, 'edit']);
    $router->post('/customers/delete', [CustomersController::class, 'delete']);
//EMPOYEES
    $router->get('/employees', [EmployeesController::class, 'index']);
    $router->get('/employees/add', [EmployeesController::class, 'add']);
    $router->post('/employees/add', [EmployeesController::class, 'add']);
    $router->get('/employees/edit/{id}', [EmployeesController::class, 'edit']);
    $router->post('/employees/edit/{id}', [EmployeesController::class, 'edit']);
    $router->post('/employees/delete', [EmployeesController::class, 'delete']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
