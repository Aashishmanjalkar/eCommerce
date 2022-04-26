@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <h1 class="mt-4">Shopping Cart </h1>
        </div>
        <div class="col-4 mt-4">
        </div>
    </div>
    @php
        $total = 0;
    @endphp
    @foreach ($products as $item)
    <div class="row">
        <div class="col-4 mt-2">
            <img src="{{$item->gallery}}"  class="card-img-top Image" alt="img">
        </div>
        <div class="col-4">
            <h5 class="card-title mt-2">{{$item->name}}</h5>
            <p class="card-text"> {{$item->description}}

            </p>
            <p>Rs {{number_format($item->price)}} </p>
            <p  >Available Quantity {{$item->quantity}}</p>
            
            <div class="add d-flex">
                <a href="/subQuantity/{{$item->id}}" class="btn btn-danger  {{($item->cart_quantity < 1) ? "disabled": ""}}" >-</a>
                {{-- <a href="/subQuantity/{{$item->id}}" class="btn btn-danger  {{($item->cart_quantity < 1) ? "": ""}}" >-</a> --}}
                <p class="my-1 mx-2" id="quantity">{{$item->cart_quantity}}</p>
                <a href="/addQuantity/{{$item->id}}"  id="addButton" class="btn btn-success {{($item->quantity <= $item->cart_quantity) ? "disabled": ""}}" >+</a>
             </div>
            <br>
            @if ($item->quantity>1)
            <a href="/removeCartItem/{{$item->cart_id}}" ></a>
            @endif
            <a href="/removeCartItem/{{$item->cart_id}}" class="btn btn-secondary">Remove From cart</a>
        <br>
        <br>
        </div>
        
        @php
           $total += $item->totalPrice;
        @endphp
        @endforeach

        
        <div class="col-4"> 
           <h2>Sub Total -  Rs {{isset($item) ? number_format($total) : "0"}} </h2>
           @if (isset($item))
           <a href="/orderNow  " class="mt-4"><button class="btn btn-warning " >Check Out &rarr;</button></a>
           @endif 
        </div>
      
    </div>
</div>
<script src="{{asset('script.js')}}"></script>
@endsection


