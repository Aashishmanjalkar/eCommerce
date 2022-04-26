<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller {
    //
    function index(){        
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function detail($id){
        $data = Product::find($id);
        
        return view('detail',['product'=>$data]);
    }

    function search(Request $request){
        $search = $request['query']??"";
        $data = Product::where('name','LIKE','%'.$search.'%')->get();
        return view('search',['search'=> $data]);
    }

    public function addToCart(Request $request){
        if(  $request->session()->has('user')){
            // return $request->all();
            $cart = new Cart;
            $cart->user_id= $request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $data_array = DB::table('products')->where('id',$request->product_id)->first('price');
            $price = $data_array->price;
            $cart->quantity=1;
            $userId= Session::get('user')['id']; 
            DB::table('products')->where('id',$userId)->increment('quantity',-1);
            $cart->totalPrice =$cart->quantity*$price ;
            $cart->save();
            return redirect('/cartList');
        }
        else{
            return redirect('/login');
        }
    }
 
    static function cartItem(){
        // dd($_SESSION);
        $userId= Session::get('user')['id']; 
        return Cart::where('user_id',$userId)->count();
    }

    function cartList()
    {
        $userId = Session::get('user')['id'];
       $data = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as cart_id','cart.quantity as cart_quantity','cart.totalPrice as totalPrice')
        ->where('cart.user_id',$userId)
        ->get();
        // dd($data);

    //    $total = DB::table('cart')
    //     ->where('cart.user_id',$userId)
    //     ->sum('products.price');
        return view('cartlist',['products'=>$data]);
       
    }


    function removeCartItem($id){
        Cart::destroy($id);
        return redirect('cartList');
    }

    function buyNow( ){
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->where('user_id',$userId)
        ->sum('totalPrice');
        return view('orderNow',['total'=>$total]);
    }

    function payNow(){
        $userId = Session::get('user')['id'];
        
        $data_array = DB::table('cart')->where('user_id',$userId)->select('quantity','product_id')->get()->toArray();
        // $qty = $data_array->quantity;

        // $data1_array = DB::table('cart')->where('user_id',$userId)->get('product_id')->toArray();
        // $pid = $data1_array->product_id;

        foreach ($data_array as $key => $value) {
            // dd($key);
            // dd($data_array[$key]->quantity);
            // dd($value);
            DB::table('products')->where('id',$value->product_id)->decrement('quantity',$value->quantity);
        }
        // dd($data_array,$data1_array);


        DB::table('cart')->where('user_id',$userId)->delete();
        return view('/booked');
    }

    function addQuantity($id)
    {   
        $userId = Session::get('user')['id'];
        // DB::table('products')
        // ->where('id', $id)
        // ->increment('quantity',-1);
        DB::table('cart')
        ->where('product_id',$id )
        ->where('user_id',$userId )
        ->increment('quantity',1);
        $data_array = DB::table('products')->where('id',$id)->first('price');
       $price = $data_array->price;

        $qty_array = DB::table('cart')->where(['product_id'=>$id,'user_id'=>$userId])->get('quantity')->first();
        $qty = $qty_array->quantity;

        DB::table('cart')
        ->where(['product_id'=>$id,'user_id'=>$userId])->update(['totalPrice'=>$qty*$price]);
        return redirect('/cartList');

    }

    function subQuantity($id){
        $userId = Session::get('user')['id'];
        // DB::table('products')
        // ->where('id', $id)
        // ->increment('quantity',1);
        DB::table('cart')
        ->where('product_id',$id )
        ->where('user_id',$userId )
        ->increment('quantity',-1);

        $quantity_array =DB::table('cart')
        ->where('product_id',$id )
        ->where('user_id',$userId )
        ->select('quantity')
        ->first();
        
        if($quantity_array->quantity < 1){
            Cart::where(['product_id'=>$id,'user_id'=>$userId])->delete();
            return redirect('cartList');
        }

        $data_array = DB::table('products')->where('id',$id)->first('price');
        $price = $data_array->price;
 
         $qty_array = DB::table('cart')->where(['product_id'=>$id,'user_id'=>$userId])->get('quantity')->first();
         $qty = $qty_array->quantity;
 
         DB::table('cart')
         ->where(['product_id'=>$id,'user_id'=>$userId])->update(['totalPrice'=>$qty*$price]);
        return redirect('/cartList');

    }

    function smartPhone(){ 
        // $data1 = DB::table('products')->where('category','SmartPhone')->get();
        $data = Product::where('category','SmartPhone')->get();
        return view('filter/smartPhone',['smartPhone'=>$data]);
    }

    function smartTv(){
        $data = Product::where('category','SmartTv')->get();
        return view('filter/smartTv',['smartTv'=>$data]);
    }

    function smartWatch(){
        $data = Product::where('category','SmartWatch')->get();
        return view('filter/smartWatch',['smartWatch'=>$data]);
    }

    function change(){
        return view('/');
    }

}
