<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('email', $user->email)->first();
     
            if($finduser){
     
                $token = JWTAuth::fromUser($finduser);
                
                if(env('APP_ENV') == "local"){
                    return redirect()->to('/front-test')->with("token", $token);
                }else{
                    return redirect()->to('/')->with("token", $token);
                }
                
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    "role_id" => 2,
                    "telephone" => "0",
                    "address" => "0",
                    'password' => bcrypt(uniqid())
                ]);

                $token = JWTAuth::fromUser($newUser);
    
                if(env('APP_ENV') == "local"){
                    return redirect()->to('/front-test')->with("token", $token);
                }else{
                    return redirect()->to('/')->with("token", $token);
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
