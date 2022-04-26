
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
          <a class="navbar-brand" href="/">Admin Panel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/availableQuantity">Available Items</a>
              </li>
            </ul>
            <ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Log Out</a>
                  </li> 
            </ul>
          </div>
        </div>
      </nav>

      
      <h2 class="text-center mt-4" >Update Item To Cart</h2>
      <div class="container ">
          <div class="row ">
              <div class="col-7 m-auto">

      <form action="{{url('/update')}}/{{$product->id}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name of the Product</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}" aria-describedby="nameHelp">
          </div>
        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">Price of the Product</label>
            <input type="number" class="form-control" name="price" value="{{$product->price}}"   aria-describedby="priceHelp">
          </div>

        <div class="mb-3">
            <label for="exampleInputCategory" class="form-label">Category of the Product</label>
            <input type="text" class="form-control" name="category" value="{{$product->category}}"   aria-describedby="categoryHelp">
          </div>

          {{-- <p>Choose Category</p>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="SmartPhone" name="category" id="flexRadioDefault1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
             Smart Phone
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="SmartTv"  name="category" id="flexRadioDefault2" >
            <label class="form-check-label" for="flexRadioDefault2">
              Smart Tv
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="SmartWatch"  name="category" id="flexRadioDefault3" >
            <label class="form-check-label" for="flexRadioDefault3">
              Smart Watch
            </label>
          </div> --}}

        <div class="mb-3">
            <label for="exampleInputUrl" class="form-label">Url of the Product</label>
            <input type="text" class="form-control" name="gallery" value="{{$product->gallery}}"   aria-describedby="urlHelp">
          </div>
        <div class="mb-3">
            <label for="exampleInputDescrition" class="form-label">Description of the Product</label>
            <input type="text" class="form-control" name="description"  value="{{$product->description}}"   aria-describedby="descriptionHelp">
          </div>
        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">Quantity of the Product</label>
            <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}"   aria-describedby="quantityHelp">
          </div>
          <button class="btn btn-primary ">Submit</button>
      </form>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>