<?php
    use App\Http\Controllers\ProductController;
    $total=0;
    if(Session::has('user'))
    {
      $total = ProductController::cartItem();
    }

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand mx-4 fs-3" href="/">Ignite </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-1 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <div class="dropdown pt-1">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item " href="/smartPhone">Smart Phone</a></li>
              <li><a class="dropdown-item " href="/smartTv">Smart Tv</a></li>
              <li><a class="dropdown-item " href="/smartWatch">Smart Watch</a></li>
            </ul>
          </div>
          {{-- <li class="nav-item">
            <a class="nav-link" href="/smartPhone">About</a>
          </li>
          
        <form action="/search" class="d-flex mx-2">
            <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        
        </ul>
        
       
        <div class="d-flex">
          <ul  class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  " href="/cartList"> 
            <img class='cartImg' src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/000000/external-shopping-cart-miscellaneous-kiranshastry-gradient-kiranshastry-1.png"/>
          <span class="badge bg-primary" >{{$total}}</span>  cart </a>
          </li>
          @if (Session::has('user'))
          <div class="dropdown pt-1">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
              {{Session::get('user')['name']}}
            </button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item "  href="/logout">Logout</a></li>
            </ul>
          </div>
          
              
          @else
            <li class="nav-item">
              <a class="nav-link" href="/logout">Login</a>
            </li>         
          @endif
         
          
        </ul>
        </div>
        
      </div>
    </div>
  </nav>
  <style>
    .cartImg{
      height: 31px;

    }
  </style>

