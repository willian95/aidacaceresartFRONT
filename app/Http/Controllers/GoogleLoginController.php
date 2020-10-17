<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
                return redirect()->to('/')->with("token", $token);
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt(uniqid())
                ]);
    
                return redirect()->to('/')->with("token", $token);
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
