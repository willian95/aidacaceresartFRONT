<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuestUserStoreRequest;
use App\GuestUser;

class GuestUserController extends Controller
{
    
    function store(GuestUserStoreRequest $request){

        try{

            $guest = GuestUser::updateOrCreate(
                ["email" => $request->email],
                ["name" => $request->name, "address" => $request->address, "phone" => $request->phone]
            );

            return response()->json(["success" => true, "guest" => $guest]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
