<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    
    function fetchProduct(){

        $products = Product::with("productFormatSizes.size")->orderBy("id", "desc")->take(6)->get();
        return response()->json(["products" => $products]);

    }

}
