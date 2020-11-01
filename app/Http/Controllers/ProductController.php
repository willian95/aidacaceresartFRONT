<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function show($slug){

        $product = Product::where("slug", $slug)->with("productFormatSizes")->first();

        return view("productDetail", ["product" => $product]);

    }
}
