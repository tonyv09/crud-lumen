<?php

use App\Models\Usuario;
use Illuminate\Http\Request; 
use App\Http\Controllers\UsersController;
use Illuminate\Http\RedirectResponse;
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
$router->post('/users/login',["uses"=>"UsersController@getToken"]);
$router->group(['middleware'=>['auth']],function() use($router){
    //rutas de usuario que requieren autenticacion
$router->get('/users/listar',['uses'=>'UsersController@index'] );

$router->post('/users/crear',['uses'=>'UsersController@createUser'] );
$router->post('/users/modificar',['uses'=>'UsersController@modificarUsuario'] );
$router->post('/users/eliminar',['uses'=>'UsersController@eliminarUsuario'] );

});

$router->get('/users/principal', function () use ($router) {
    return view("principal");
    });

//CRUD

//select

$router->get('/inicio', function () use ($router) {
   // return response()->json("ruta SELECT");
   return view("login");
});
