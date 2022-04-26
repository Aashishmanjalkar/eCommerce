@extends('master')
@section('content')
  
    <div class="container mt-4">
        <div class="row justify-content-around pt-4">
          <div class="col-4">
            <img class="detailedImg" src="{{$product['gallery']}}" alt="img">
          </div>
          <div class="col-4">
            <h1>{{$product['name']}}</h1>
            <h5 class="pt-4" >{{$product['description']}}</h5>
            <h3 class="text-primary">Price Rs {{number_format($product->price)}} </h3>
            <form action="/add_to_cart" method="POST">
              <input type="hidden" name="product_id" value="{{$product['id']}}">
              @csrf
            
              @if ($product['quantity']<=0)
                <p class="text-danger fs-1">Out of stock</p>
              @else
                <button class="btn btn-primary " >Add to Cart</button>
              @endif
          </form>
            <br>
            <a href="/"> <button class="btn btn-danger ">Back to Home</button> </a>
        </div>
        </div>

</div>
<p></p>


@endsection