<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Admin | Pengajuan Customer</title>
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
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-25">
                <div class="card">
                    <div class="card-header">Pengajuan dari customer</div>
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Customer</th>
                                  <th>Kode Lembaga</th>
                                  <th>Program</th>
                                  <th>Pilihan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                  <th>{{$loop->iteration}}</th>
                                  <td>{{$customer->nama}}</td>
                                  <?php
                                    $word = DB::table('lembagas')->whereIn('id',[$customer->index_lembaga])->select('nama_lembaga')->get();
                                    $split = explode('"', $word);
                                    $lembagaNama = $split[count($split)-2];
                                  ?>
                                  <td>{{$lembagaNama}}</td>
                                  <td>{{$customer->program}}</td>
                                  <td>
                                    <div class="btn-group">
                                        <a href="{{ url('admins/customer/detail/'.$customer->id)}}" type="button" class="btn btn-sm btn-primary">Cetak</a>
                                        <a href="{{ route('admins.checked',$customer->id)}}" type="button" class="btn btn-sm btn-success">Check</a>
                                    </div>
                                  </td>
                                </tr>
                                @empty
                                  <td colspan="6" class="text-center">Tidak ada data...</td>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <br>
                <div class="btn-group">
                  <a href="{{ route('admins')}}" type="button" class="btn btn-danger">Kembali</a>
                </div>
            </div>
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
