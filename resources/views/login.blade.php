@extends('master')
@section('content')
    <div class="container mt-4 custom-login">
        <div class="row">
          <h1 class="text-center py-4" >Welcome To Ignite Electronics</h1>
            <div class="col-5 m-auto pt-4">
                <form method="post" action="{{url('/login')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                      <button type="submit" class="btn btn-success userLogin">Login</button>
                </div>
                </form>
            </div>
           
              <div class="row mt-4">
                <div class="col-5 m-auto">
                 <a href="{{url('/register')}}" class="btn btn-warning newUser">New User Register Here</a>
               </div>
             </div>
      </div>

      <style>
        .custom-login{

        }
        .userLogin{
          margin-left: 208px;
          font-size: 19px;
          font-weight: 500;
        }
        .newUser{
          margin-left: 136px;
          font-size: 19px;
          font-weight: 500;
        }
      </style>
     

           
@endsection
