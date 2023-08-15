<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <style>
    .bg-1 {
        background-color: rgb(58, 20, 95);
        color: #a8dcff;
    }
</style>
  <body>
    <nav class="navbar navbar-light bg-1">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{ route('welcome')}}">MY COURSE</a>
          <a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </div>
    </nav>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-12 text-left"> </div>
            <div class="container">
            <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                <div class="panel-body"><img src="/img/ast.jpg" class="img-responsive" style="width:50%" alt="Image"></div>
                <h3><b>Lembaga Kursus</b></h3><br>
                <a class="btn btn-primary" href="{{route('admins.lembaga')}}" role="button">Detail</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-body"><img src="/img/ast.jpg" class="img-responsive" style="width:50%" alt="Image"></div>
                    <h3><b>Customer</b></h3><br>
                    <a class="btn btn-primary" href="{{route('admins.customer')}}" role="button">Detail</a>
                </div>
            </div>
            </div>
            </div>
        </div>
        <br>
            <div class="btn-group">
                <a href="{{ route('welcome')}}" type="button" class="btn btn-danger">Kembali</a>
            </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>
