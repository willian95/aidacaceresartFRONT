<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductFormatSize;

class FormatSizeController extends Controller
{
    
    function fetchByProduct($productId){

        $formatSizes = ProductFormatSize::with("size","format")->where("product_id", $productId)->get();
        return response()->json(["formatSizes" => $formatSizes]);

    }

}
