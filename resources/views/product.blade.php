@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        {{-- <h1>{{$cart['product_id']}}</h1> --}}
        @foreach ($products as $item)
        <div class="card Card mt-2" >
            <img src="{{$item['gallery']}}"  class="card-img-top Image" alt="img">
            <div class="card-body">
              <h5 class="card-title">{{$item['name']}}</h5>
              <p class="card-text"  >
                <?php $string = $item['description'];
                      if (strlen($string) > 95) {
                      $trimstring = substr($string, 0,95). '....';
                      } else {
                      $trimstring = $string;
                      }
                      echo $trimstring;
                      ?>
                </p>
             
              <a href="detail/{{$item['id']}}" class="btn btn-primary buy">Know More</a>
            </div>
          </div>
          @endforeach
    </div>

</div>
@endsection
