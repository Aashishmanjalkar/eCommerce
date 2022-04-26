@extends('master')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($search as $item)
        <div class="card Card" >
            <img src="{{$item['gallery']}}"  class="card-img-top Image" alt="img">
            <div class="card-body">
              <h5 class="card-title">{{$item['name']}}</h5>
              <p class="card-text">
                <?php $string = $item['description'];
                if (strlen($string) > 95) {
                $trimstring = substr($string, 0,95). '....';
                } else {
                $trimstring = $string;
                }
                echo $trimstring;
                ?>
              </p>
              <a href="detail/{{$item['id']}}" class="btn btn-primary">Buy Now</a>
            </div>
          </div>


          @endforeach
    </div>

</div>
@endsection

