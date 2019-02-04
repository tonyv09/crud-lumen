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
$router->get('/users/listar/{id}',['uses'=>'UsersController@index'] );

$router->post('/users',['uses'=>'UsersController@createUser'] );
});

$router->get('/users/principal/{data}', function ($data) use ($router) {
    return view('principal',array("users"=>$data));
    });

//CRUD

//select

$router->get('/inicio', function () use ($router) {
   // return response()->json("ruta SELECT");
   return view("login");
});

//insert
$router->post('/insertar', function (Request $request) use ($router) {
    $nuevo= new Usuario();
    $nuevo->nombre_usuario=$request->input('nombre');
    $nuevo->usuario=$request->input('usuario');
    $nuevo->estado=$request->input('estado');
    if($nuevo->save()){
        return response()->json($nuevo);
    }else{
        return response()->json("error!");
    }


 });
 

//update
$router->put('/editar', function (Request $request) use ($router) {
    $busqueda= Usuario::where('id','=',$request->input('id'))->first();
    if($busqueda!=null){
        $busqueda->usuario=$request->input('usuario');
        $busqueda->nombre_usuario=$request->input('nombre');
        $busqueda->estado=$request->input('estado');
        $busqueda->save();
        return response()->json($busqueda);

    }else{
        return response()->json("error!");
    }

 });
//delete
$router->post('/eliminar', function (Request $request) use ($router) {
    $busqueda= Usuario::where('id','=',$request->input('id'))->first();
    if($busqueda!=null){
        $busqueda->id=$request->input('id');
        //$busqueda->nombre_usuario=$request->input('nombre');
        //$busqueda->estado=$request->input('estado');
        $busqueda->delete();
        return response()->json($busqueda);

    }else{
        return response()->json("error!");
    }

 });

