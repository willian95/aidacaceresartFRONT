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
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_format_size_id = $request->formatSizeId;
            $cart->amount = 1;
            $cart->save();
      


        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch(){

        $user = JWTAuth::parseToken()->toUser();
        
        $itemArray = [];
        $carts = Cart::where("user_id", $user->id)->with("productFormatSize", "productFormatSize.product", "productFormatSize.format", "productFormatSize.size", "productFormatSize.cart")->get();

        return response()->json(["items" => $carts]);

    }

    function guestFetch(Request $request){

        $itemArray = [];
        foreach($request->item as $item){
            
            $product = ProductFormatSize::where("id", $item['id'])->with("product", "format","size")->first();
            if($product){
                array_push($itemArray, $product);
            }
            
        }

        return response()->json(["items" => $itemArray]);

    }

    function deleteFromCart(Request $request){

        try{

            $user = JWTAuth::parseToken()->toUser();
            Cart::where("id", $request->id)->where("user_id", $user->id)->first()->delete();

            return response()->json(["success" => true, "msg" => "Producto eliminado del carrito"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema", "ln" => $e->getLine(), "err" => $e->getMessage()]);
        }

    }

}
