<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\ProfileRequest;
use App\User;
use JWTAuth;

class ProfileController extends Controller
{
    
    function index(){
        return view("perfil");
    }

    function update(ProfileRequest $request){

        try{

            $user = JWTAuth::parseToken()->toUser();

            if(User::where("email", $request->email)->where("id", "<>", $user->id)->count() > 0){
                return response()->json(["success" => false, "msg" => "Este correo ya se encuentra registrado"]);
            }

            $profile = User::find($user->id);
            $profile->name = $request->name;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->update();

            return response()->json(["success" => true, "msg" => "Perfil actualizado"]);

        }catch (Exception $e) {
            return reponse()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
