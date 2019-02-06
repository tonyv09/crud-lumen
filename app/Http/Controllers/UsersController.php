<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
   function index(Request $request){

        if($request->isJson()){

            $user= User::all();

            return response()->json([$user],201);

        }
        else{
            return response()->json(array("Error"=>"peticion no valida"), 401); 

        }   
   }
   
   function createUser(Request $request){

    if($request->isJson()){
        $data=($request->json()->all());
        $user=User::create([
            "name"=>$data['name'],
            "username"=>$data['username'],
            "email"=>$data['email'],
            "password"=>Hash::make($data['password']),
            "api_token"=>str_random(60)
        ]);
        return response()->json($user,201);
    
        }
        else{
            return response()->json(array("Error"=>"peticion no valida"), 401); 
    
        }
   }
   function modificarUsuario(Request $request){

    if($request->isJson()){
        $data=($request->json()->all());
        $user=User::where('id','=',$data['id'])->first();
        $user->name=$data['name'];
        $user->username=$data['username'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->save();
        
        return response()->json($user,201);
    
        }
        else{
            return response()->json(array("Error"=>"modificacion fallida!"), 401); 
    
        }

   }

   function eliminarUsuario(Request $request){

    if($request->isJson()){
        $data=($request->json()->all());
        $user=User::where('id','=',$data['id'])->first();
        $user->delete();
        return response()->json($user,201);
    
        }
        else{
            return response()->json(array("Error"=>"peticion no valida"), 401); 
    
        }

   }


   function getToken(Request $request){
    
    if($request->isJson()){
        try{
            
            $data=$request->json()->all();
            $user=User::where('username','=',$data['username'])->first();
            if($user&& Hash::check($data['password'],$user->password)){

                return response()->json([$user],201);
            
            }
            else{
                return response()->json(["error"=>"sin contenido"]);
            }

        }catch(ModelNotFoundException $e){
            return response()->json(["error"=>$e]);

        }
    }
    return response()->json(["error"=>"sin json"]); 
      

   }
}
