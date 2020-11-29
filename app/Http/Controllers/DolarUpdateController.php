<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\DolarPrice;

class DolarUpdateController extends Controller
{
    
    function index(){

        $response = Http::get('https://www.freeforexapi.com/api/live?pairs=USDCOP');

        $data =json_decode($response->body());
        
        if($data){
            $dolar = DolarPrice::find(1);
            $dolar->rate  = $data->rates->USDCOP->rate;
            $dolar->update();
        }

    }

    function getPrice(){

        $dolar = DolarPrice::find(1);
        return response()->json(["dolar" => $dolar->rate]);

    }

}
