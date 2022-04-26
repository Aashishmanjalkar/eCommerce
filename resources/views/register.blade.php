@extends('master')
@section('content')
    <div class="container mt-4 custom-register">
        <div class="row">
            <div class="col-5 m-auto">
                <h1 class="text-center">Register</h1>
                <form method="post" action="{{url('/register')}}">
                    @csrf
                    @php
                        
                    @endphp
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                        @error('name')
                     
                        <span class="text-danger"> {{ $message }}  </span>
                        @enderror
                    
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                     
                        @error('email')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                   
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
     
                      @error('password')
                      <span class="text-danger">{{ $message }} </span>
                      @enderror
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  </form>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
