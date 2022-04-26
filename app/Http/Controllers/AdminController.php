<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    function adminLogin(Request $request){
      
        $admin = Admin::Where(['admin_name'=>$request->admin_name,'password'=>$request->password])->first();
       if(!$admin){
           return "InValid Credential";
       }else{
        //    return redirect('/');
        $request->session()->put('admin',$admin);
        return view('/adminPanel');
       }
    }

    function adminLogOut(){
        
    }

    public function store(Request $request){
      
        $item = new Product;
        $item->name = $request['name'];
        $item->price = $request['price'];
        $item->category = $request['category'];
        $item->gallery = $request['gallery'];
        $item->description = $request['description'];
        $item->quantity = $request['quantity'];
        $item->save();

        return redirect('/adminPanel');
    }

    function availableQuantity(){
        $data = Product::all();
        return view('admin',['products'=>$data]);
    }

    function update($id){
        $product = Product::find($id);
        return view('update',compact('product'));
    }

    function delete($id){
        $data = Product::find($id)->delete();
        return redirect('availableQuantity');
    }

    function updating($id ,Request $request){
        $item = Product::find($id);
        $item->name = $request['name'];
        $item->price = $request['price'];
        $item->category = $request['category'];
        $item->gallery = $request['gallery'];
        $item->description = $request['description'];
        $item->quantity = $request['quantity'];
        $item->save();

        return redirect('availableQuantity');

    } 

    function adminPhone(){
        $data = Product::where('category','SmartPhone')->get();
        return view('admin',['products'=>$data]);
    }
    function adminTv(){
        $data = Product::where('category','SmartTv')->get();
        return view('admin',['products'=>$data]);
    }
    function adminWatch(){
        $data = Product::where('category','SmartWatch')->get();
        return view('admin',['products'=>$data]);
    }
}
