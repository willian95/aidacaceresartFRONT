<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\ProductFormatSize;
use JWTAuth;

class CartController extends Controller
{
    
    function index(){
        return view("cart");
    }

    function store(Request $request){

        try{

            $user = JWTAuth::parseToken()->toUser();

            /*if(Cart::where("product_format_size_id", $request->formatSizeId)->where("user_id", $user->id)->count() > 0){

                $cart = Cart::where("product_format_size_id", $request->formatSizeId)->where("user_id", $user->id)->first();
                $cart->amount = $cart->amount + $cart->amount;
                $cart->update();

            }else{*/
                $cart = new Cart;
                $cart->user_id = $user->id;
                $cart->product_format_size_id = $request->formatSizeId;
                $cart->amount = 1;
                $cart->save();
            //}


        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch(){

        $user = JWTAuth::parseToken()->toUser();
        
        $itemArray = [];
        $carts = Cart::where("user_id", $user->id)->get();

        foreach($carts as $item){
            
            $product = ProductFormatSize::where("id", $item->product_format_size_id)->with("product", "format","size")->first();

            array_push($itemArray, $product);
        }

        return response()->json(["items" => $itemArray]);

    }

    function guestFetch(Request $request){

        $itemArray = [];
        foreach($request->item as $item){
            
            $product = ProductFormatSize::where("id", $item['id'])->with("product", "format","size")->first();

            array_push($itemArray, $product);
        }

        return response()->json(["items" => $itemArray]);

    }

}
