<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        // return User::where(['email'=>$request->email])->first();
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return "UserName Does not exists";
        }
        else{
            // $cart = Cart::all();
            $request->session()->put('user',$user);
            return redirect('/');
            // return view('/',['cart'=> $cart]);
        } 
    }
    public function register(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required'
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->put('user',$user);
        return redirect('/');
    }

    

   
}
