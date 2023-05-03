<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->get();
return view("home",compact('products','data'));
    }

    
    public function login(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
return view("client/login",compact('data'));
    }
    public function registration(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        return view("client/registration",compact('data')) ;
    }
    public function registerUser(Request $request){
       
    $request->validate([
        'name' => 'required',
        'email'=> 'required|email|unique:users',
        'password' => 'required|min:8|max:12',
    ]);
    $user = new User();
    $user->name= $request->name;
    $user->email= $request->email;
    $user->password= Hash::make($request->password);
    $res= $user->save();
    if($res){
        return back()->with('success','success');
    }
    else{
        return back()->with('fail','fail');
    }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:8|max:12',
        ]);
        $user =  User::Where('email','=', $request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
        $request->session()->put('loginId',$user->id);
                if($user->roles=='1'){
                      return redirect('adminhome');
                }else{
                 return redirect('home');}
                }
            else{
                return back()->with('fail','fail');
            }
        }
            else{
                return back()->with('fail','sai tai khoan');
                }
        }
    public  function home(){
        $data=array();
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->get();
        return  view("home",compact('data','products'));
    }
   public function logout(){
        if(session()->has('loginId')){
            session()->pull('loginId');    
            return redirect('login');
        }
    }
    public  function adminhome(){


        $data=array();
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        }        
        $products =DB::table('products')->get();
        return  view("homeadmin",compact('products','data'));
    }
    public function addproduct(){
        return view('admin.products.addproduct');
    }
    public function shopall(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->get();
        return view('client.shopall',compact('products','data'));
    }
    public function tops(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->where('products_theloai','like','aongan' )->orWhere('products_theloai','like','aokhoac')->get();
        return view('client.tops',compact('products','data'));
    } 
    public function bottoms(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->where('products_theloai','like','quanngan' )->orWhere('products_theloai','like','quandai')->get();
        return view('client.bottoms',compact('products','data'));
    } 
    public function outerwear(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('products')->where('products_theloai','like','aokhoac' )->get();
        return view('client.outerwear',compact('products','data'));
    } 
    public function search(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =null;
        return view('client.search',compact('products','data'));
    }
    public function searchsp(Request $request){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $sp=$request->txtsearch;
        // dd('%'.$request->txtsearch.'%');
        $products =DB::table('products')->where('products_name','like','%'. $sp.'%')->get();
        
        return view('client.search',compact('products','data'));
    }
    public function searchDonhang(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =null;
        return view('client.donhang',compact('products','data'));
    }
    public function searchDonhang1(Request $request){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $sp=$request->txtsearch;
        // dd('%'.$request->txtsearch.'%');
        $products =DB::table('cart')->where('cart_phone','like','%'. $sp.'%')->get();
        
        return  view('client.donhang',compact('products','data'));
        //  $product;
        // 
    }
    public function  donhangchitiet($id){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $product =DB::table('cart')->where('cart_id','=',$id)->get();
        $s1 =DB::table('cart_detai')->where('cart_detai_id' ,'=', $id)->get();
        return view('client.chitiet',compact('s1','product','data'));
    }

}
