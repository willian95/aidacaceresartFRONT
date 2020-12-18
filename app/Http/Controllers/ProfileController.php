<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\User;
use App\Payment;
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
            $profile->telephone = $request->phone;
            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->country_id = $request->country;
            $profile->update();

            return response()->json(["success" => true, "msg" => "Perfil actualizado"]);

        }catch (Exception $e) {
            return reponse()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetchSales($page){

        try{

            $user = JWTAuth::parseToken()->toUser();

            $sales = Payment::where("user_id", $user->id)->with("user", "user.country")
            ->with(['productPurchases.productFormatSize' => function ($q) {
                $q->withTrashed();
                $q->with(['product' => function ($k) {
                    $k->withTrashed();
                }]);
                $q->with(['size' => function ($k) {
                    $k->withTrashed();
                }]);
            }])
            ->orderBy('id', 'desc')->get();

            return response()->json(["success" => true, "sales" => $sales]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
