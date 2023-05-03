<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_detail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Function_;



class AdminProductController extends Controller
{

    //
    public function addproducts(Request $request){
      // dd( $request->file('image1'));
    $request->validate([
        'noibat' => 'required',
        'theloai'=> 'required',
        'name' => 'required',
        'noidung'=> 'required',
        'image1'=> 'required',
        'image2'=> 'required',
        'price'=> 'required',
        'discount'=> 'required',
        'soluong'=> 'required',
    ]);

    // $request->noidung

    $path = public_path('images/sanpham/');
    $imageName1 = $request->image1->getClientOriginalName();
    $request->image1->move($path, $imageName1);
    $imageName2 =  $request->image2->getClientOriginalName();
    $request->image2->move($path, $imageName2);
 
    $products = new Product();
    $products->products_noibat= $request->noibat;
    $products->products_theloai= $request->theloai;
    $products->products_name= $request->name;
    $products->products_description= $request->noidung;
    $products->products_image=  $imageName1;
    $products->products_image2=  $imageName2 ;
    $products->products_price= $request->price;
    $products->products_discount= $request->discount;
    $products->products_soluong= $request->soluong;
    
    $res= $products->save();
    if($res){
        return back()->with('success','success');
    }
    else{
        return back()->with('fail','fail');
    }
    }
    public function updateproduct($id){
        $product=DB::table('products')->find($id);
        return view('admin.products.update',compact('product'));
    }
    public function updateproducts(Request $request,$id){
        $request->validate([
            'noibat' => 'required',
            'theloai'=> 'required',
            'name' => 'required',
            'noidung'=> 'required',
            'price'=> 'required',
            'discount'=> 'required',
            'soluong'=> 'required',
        ]);
        $product = Product::where('id',$id)->first();
        $data = [];
        if($request-> noibat != $product -> products_noibat){
            $data['products_noibat'] = $request-> noibat;
        }
        if($request-> theloai != $product -> products_theloai){
            $data['products_theloai'] = $request-> theloai;
        }
        if($request-> name != $product -> products_name){
            $data['products_name'] = $request-> name;
        }
        if($request-> noidung != $product -> products_description){
            $data['products_description'] = $request-> noidung;
        }
        if($request-> price != $product -> products_price){
            $data['products_price'] = $request-> price;
        }
        if($request-> discount != $product -> products_discount){
            $data['products_discount'] = $request-> discount;
        }
        if($request-> soluong != $product -> products_soluong){
            $data['products_soluong'] = $request-> soluong;
        }
        if($request-> products_image !=$request-> image1){
            $path = public_path('images/sanpham/');
            $imageName1 = $request->image1->getClientOriginalName();
            $request->image1->move($path, $imageName1);
            $data['products_image']=$request-> $imageName1;
        }
        if($request-> products_image2 !=$request-> image2){
            $path = public_path('images/sanpham/');
            $imageName2 = $request->image2->getClientOriginalName();
            $request->image2->move($path, $imageName2);
            $data['products_image2']=$request-> $imageName2;
        }
        $res= Product::where('id', $id)->update($data);
       
        if($res){
            return back()->with('success','success');
        }
        else{
            return back()->with('fail','fail');
        }
    }
    public function deleteproducts($id){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        Product::find($id)->delete();
        $products =DB::table('products')
        ->get();
        return view('homeadmin',compact('products','data'));
    }


    public function updateadmindonhang($id){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $data1 = [];
        $data1['cart_trangthai']=1;
       Cart::where('cart_id', $id)->update($data1);
        $products =DB::table('cart')->get();
        return view('admin.donhangadmin',compact('data',"products"));
    }
    public function deleteadmindonhang($id){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
      Cart::where('cart_id', $id)->delete();
      Cart_detail::where('cart_detai_id', $id)->delete();
        $products =DB::table('cart')
        ->get();
        return view('admin.donhangadmin',compact('data',"products"));
    }
        public function    admindonhang(){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $products =DB::table('cart')->get();
        return view('admin.donhangadmin',compact('data',"products"));
    }
    public function  admindonhangchitiet($id){
        $data=null;
        if( session()->has('loginId')){
            $data = User::Where('id','=', session()->get('loginId'))->first();
        } 
        $product =DB::table('cart')->where('cart_id','=',$id)->get();
        $s1 =DB::table('cart_detai')->where('cart_detai_id' ,'=', $id)->get();
        return view('admin.adminchitiet',compact('s1','product','data'));
    }
   }