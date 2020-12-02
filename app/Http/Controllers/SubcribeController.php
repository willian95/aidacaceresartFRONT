<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscribeStoreRequest;
use App\NewsletterUser;

class SubcribeController extends Controller
{
    
    function store(SubscribeStoreRequest $request){

        try{

            NewsletterUser::firstOrCreate(
                ["email" => $request->newsletterEmail]
            );

            return response()->json(["success" => true]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage()]);
        }

    }

}
