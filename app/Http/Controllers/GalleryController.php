<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class GalleryController extends Controller
{
    
    function index(){
        return view("tienda");
    }

    function fetchAll(){
        $products = Product::with("productFormatSizes.size")->orderBy("id", "desc")->get();
        return response()->json(["products" => $products]);
    }

}
