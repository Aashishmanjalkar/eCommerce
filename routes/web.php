<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//User
Route::get('/login', function () {return view('login');});
Route::post("/login",[UserController::class,'login']);
Route::get("/register",function(){ return view('register');});
Route::post("/register",[UserController::class,'register']);
Route::get("/logout",function () {
    Session::forget('user');
    return redirect('/login');
});

//Products and cart
Route::get("/",[ProductController::class,'index']);
Route::get("/detail/{id}",[ProductController::class,'detail']);
Route::get("/search",[ProductController::class,'search']);
Route::get('/cartList',[ProductController::class,'cartList']);
Route::get('/removeCartItem/{id}',[ProductController::class,'removeCartItem']);
Route::post("/add_to_cart",[ProductController::class,'addToCart']);

Route::middleware(['userGuard'])->group(function(){
    Route::get('/orderNow',[ProductController::class,'buyNow']);
    Route::get('/payNow',[ProductController::class,'payNow']);
});
Route::get('/addQuantity/{id}',[ProductController::class,'addQuantity']);
Route::get('/subQuantity/{id}',[ProductController::class,'subQuantity']);
Route::get('/buyNow',[ProductController::class,'buy']);

// Admin
Route::get('/admin',function(){
return view('adminLogin');
});
Route::post('/adminLogin',[AdminController::class,'adminLogin']);

Route::get('/adminLogOut',function(){
    Session::forget('admin');
    return redirect('/admin');
});


Route::post('/add',[AdminController::class,'store']);

Route::middleware(['adminGuard'])->group(function(){
    Route::get('/adminPanel', function () {return view('adminPanel');});
    Route::get('/availableQuantity',[AdminController::class,'availableQuantity']);
    Route::get('/update/{id}',[AdminController::class,'update']);
    Route::get('/delete/{id}',[AdminController::class,'delete']);
});

Route::post('/update/{id}',[AdminController::class,'updating']);
Route::get('/no-access',function(){
    echo "Acess Denied";
    die;
});

Route::get('/adminPhone',[AdminController::class,'adminPhone'])->middleware('adminGuard');
Route::get('/adminTv',[AdminController::class,'adminTv'])->middleware('adminGuard');
Route::get('/adminWatch',[AdminController::class,'adminWatch'])->middleware('adminGuard');
// *********

Route::get('/smartPhone',[ProductController::class,'smartPhone']);
Route::get('/smartTv',[ProductController::class,'smartTv']);
Route::get('/smartWatch',[ProductController::class,'smartWatch']);


Route::get('/booked',function(){
    return view('booked');
});