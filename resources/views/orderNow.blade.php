@extends('master')
@section('content')

        <div class="container">            
                    <div class="card m-auto payment" >
                        <div class="card-body">
                          <h1 class="card-title">Total Amount</h1>
                          <h2 class="card-text">{{number_format($total)}} Rs/-</h2>
              
                          <h5>Payment Mode</h5>
                          <div class="form-check my-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Cash On Delivery
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                             Online Payment
                            </label>
                          </div>
                          <a href="/payNow" class="btn btn-primary mt-2">Order Now</a>
                          <br>
                          <br>
                          <a href="/cartList" class="btn btn-secondary ">Back to cart</a>
                        </div>
                      </div>                       
            </div>
        </div>

        <style>
            .payment{
                width: 25rem;
                top: 144px;
            }
        </style>
@endsection