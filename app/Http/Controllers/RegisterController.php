<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;

class RegisterController extends Controller
{
    function register(RegisterRequest $request){

        try{

            $hash = Str::random(32).uniqid();

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->dni = $request->dni;
            $user->telephone = $request->phone;
            $user->address = $request->address;
            $user->password = bcrypt($request->password);
            $user->country_id = $request->country;
            $user->role_id = 2;
            $user->register_code = $hash;
            $user->save();

            $to_name = $user->name;
            $to_email = $user->email;
            $language = $request->language;
            $data = ["user" => $user, "hash" => $hash, "language" => $language];


            \Mail::send("emails.register", $data, function($message) use ($to_name, $to_email, $language) {

                if($language == "spanish"){
                    $message->to($to_email, $to_name)->subject("Bienvenido/a! Solo falta un paso para tu registro en Aidaca E-Store!");
                }else{
                    $message->to($to_email, $to_name)->subject("Welcome to Aida E-Gallery, just one more step!");
                }
                
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

            return response()->json(["success" => true, "msg" => "Revisa tu bandeja de entrada para validar tu email"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function check($hash){

        try{

            $user = User::where("register_code", $hash)->first();
            if($user){

                $user->email_verified_at = Carbon::now();
                $user->register_code = "";
                $user->update();

                //Auth::loginUsingId($user->id);
                return redirect()->to("/")->with("user_id", $user->id);

            }else{

                echo "Este código no existe";

            }

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }
}
