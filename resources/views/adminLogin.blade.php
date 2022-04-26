<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Login</title>
  </head>
  <body>
 

<div class="container mt-4 custom-login">
    <div class="row">
        <div class="col-5 m-auto">
          <h1 class="text-center" >Admin Login</h1>
            <form method="post" action="{{url('/adminLogin')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">User Name</label>
                  <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-success adminLogin">Admin Login</button>
            </div>
              </form>
            </div>
        </div>
    </div>
</div>

<style>
  .adminLogin{
    margin-left: 152px;
    margin-top: 34px;
    padding: 8px 22px;
    font-size: 18px;
  }
  .custom-login{
    height: 500px;
    padding-top: 100px
  }

 
</style>

  
</body>
</html>