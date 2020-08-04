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

/*
 * Only routes that go to views, this is not for data transfer
 */

use Illuminate\Support\Facades\File;

$router->get('/{id:.*}', ['as' => 'home', 'uses' => 'HomeController@index']);


$router->group(['middleware' => 'auth'], function ($router) {
    $router->post('/create',function (\Illuminate\Http\Request $request){
        return response()->json($request->all());
    });
});



$router->post('/requestPin','LoginController@requestPin');
$router->post('/verifyPin','LoginController@verifyPin');

$router->post('/addCompanyDetails','HomeController@addCompanyDetails');

$router->post('/uploadPdf','HomeController@uploadPdf');

$router->post('/placeOrder','HomeController@placeOrder');

$router->post('/loadCart','HomeController@loadCart');

$router->post('/getOrder','HomeController@getOrder');


$router->post('/getAllOrders','AdminController@getAllOrders');

$router->post('/getAllUsers','AdminController@getAllUsers');

$router->post('/activateUser','AdminController@activateUser');

$router->post('/deleteUser','AdminController@deleteUser');

$router->post('/deleteOrder','AdminController@deleteOrder');

$router->post('/getAllTypes','AdminController@getAllTypes');

$router->post('/checkRole','HomeController@checkRole');





