<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $products =DB::table('products')
        ->get();
        return view('products.index',compact(var_name:'products'));
    }
    public function addToCart($id){
       // session()->forget('cart');
        $product=DB::table('products')->find($id);
        $cart=session()->get(key:'cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
        }
        else{
            $cart[$id]=[
                'name'=>$product->products_name,
                'price'=>($product->products_price*(100-$product->products_discount))/100,
                'quantity'=>1,
                'image'=>$product->products_image,
            ];
        }
        session()->put('cart',$cart);
        //session()->forget('cart',$cart);
        return response()->json([
            'code'=>200,
            'message'=>'success',
           
        ], status:200);
    }
    public function showCart(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $cart[]=[
            'name'=>null,
            'price'=>null,
            'quantity'=>null,
            'image'=>null,
        ];
        $carts=session()->get('cart');

       return view('products.cart',compact('carts','data'));
    }
    public function updateCart(Request $request){
       if($request->id && $request->quantity) {
        $carts = session()->get('cart');
        $carts[$request->id]['quantity']=$request->quantity;
        session()->put('cart',$carts);
        $carts=session()->get('cart');
        $cartComponent=view('products.components.cart_components',compact(var_name:'carts'))->render();
        return response()->json(['cart_component'=>$cartComponent,'code'=>200],status:200);
       }
    }
    public function deleteCart(Request $request){
        if($request->id ) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts=session()->get('cart');
            $cartComponent=view('products.components.cart_components',compact(var_name:'carts'))->render();
            return response()->json(['cart_component'=>$cartComponent,'code'=>200],status:200);
           }
    }
    public function productDetail($id){
        $products=DB::table('products')->find($id);
        return view('client.products_detail',compact('products'));
    }
}
