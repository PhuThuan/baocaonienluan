<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_detail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function thanhtoan(Request $request){
      //dd($request->all());
       
     $cart=new Cart();
       $cart->cart_name=$request->namecart;
       $cart->cart_phone=$request->sdtcart;
       $cart->cart_diachi=$request->diachi;
       $cart->cart_trangthai=0;
       $cart->cart_total=$request->total;
       $cart->save();
       $carts = session()->get('cart');
       $lastinsertedId = $cart->id;
       foreach($carts as $id => $cartItem){
        $carts1=new Cart_detail();
        $carts1->cart_detai_id= $lastinsertedId;
        $carts1->cart_detai_name=$cartItem['name'];
        $carts1->cart_detai_quantity=$cartItem['quantity'];
        $carts1->cart_detai_price=$cartItem['price'];
        $carts1->save();
       }
       session()->forget('cart',$cart);
       return response()->json([
        'code'=>200,
        'message'=>'success',
       
    ], status:200);
    }
    public function order(){
      return;
    }
}
