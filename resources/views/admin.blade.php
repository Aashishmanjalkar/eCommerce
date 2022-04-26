
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Panel</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/adminLogin">Admin Panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/adminPanel">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/availableQuantity">Available Items</a>
              </li>
            </ul>
            <ul>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                  </button>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="/adminPhone">Smart Phone</a></li>
                    <li><a class="dropdown-item" href="/adminTv">Smart Tv</a></li>
                    <li><a class="dropdown-item" href="/adminWatch">Smart Watch</a></li>
                    <li><a class="dropdown-item" href="/availableQuantity">All</a></li>
                  </ul>
                </div>
              </li> 
            </ul>
            <ul>
                <li class="nav-item">
                    <a class="nav-link active fw-bold text-white pt-2" aria-current="page" href="/adminLogOut">Log Out</a>
                  </li> 
            </ul>
          </div>
        </div>
      </nav>
<div class="container">
    <div class="row mt-4">
        {{-- <h1>{{$cart['product_id']}}</h1> --}}
       
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Sr no</th>
                <th scope="col">Product</th>
                <th scope="col">Availabe Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>
            @php
                $srno = 1;
            @endphp
            @foreach ($products as $item)
                <tbody >
                <tr>
                    <th scope="row">{{$srno++}}</th>
                    {{-- <th scope="row">{{$item['id']}}</th> --}}
                    <td>{{$item['name']}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>
                        <a href="/update/{{$item['id']}}" class="btn btn-primary">update</a>
                        <a href="/delete/{{$item['id']}}" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                <tr>
                </tbody>
            @endforeach
          </table>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>