<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class FacebookLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver("facebook")->redirect();
    }

    public function callback()
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver("facebook")->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            //return $this->authAndRedirect($user); // Login y redirección
            $token = JWTAuth::fromUser($user);
                
            if(env('APP_ENV') == "local"){
                return redirect()->to('/front-test')->with("token", $token);
            }else{
                return redirect()->to('/')->with("token", $token);
            }
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = new User;
            $user->name = $social_user->name;
            $user->email = $social_user->email;
            //$user->facebook_id = $social_user->id;
            $user->save();

            $token = JWTAuth::fromUser($user);

            if(env('APP_ENV') == "local"){
                return redirect()->to('/front-test')->with("token", $token);
            }else{
                return redirect()->to('/')->with("token", $token);
            }

        }

        return redirect()->to('/');

    }
}
