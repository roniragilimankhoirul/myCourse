
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>List Lembaga</title>
    <style>
        .bg-1 {
            background-color: rgb(58, 20, 95);
            color: #a8dcff;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-1">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('welcome')}}">MY COURSE</a>
          @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <main>

        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                @if (session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan')}}
                </div>
                @endif
              <h1 class="fw-light">Lembaga Kursus di Indonesia</h1>
              <p class="lead text-muted">Cari lembaga kursus yang dapat membantumu dalam belajar. Sesuaikan dengan kebutuhan untuk meraih mimpimu. </p>
              <p>
                <a href="lembagas/create" class="btn btn-secondary my-2">Daftarkan Lembagamu</a>
              </p>
            </div>
          </div>
        </section>

        <div class="album py-5 bg-light">
          <div class="container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Lembaga</th>
                    <th>Alamat</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($lembagas as $lembaga)
                  <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$lembaga->nama_lembaga}}</td>
                    <td>{{$lembaga->alamat}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('/MyCourse/lembagas/'.$lembaga->id)}}" type="button" class="btn btn-sm btn-outline-secondary">Detail</a>
                        </div>
                    </td>
                  </tr>
                  @empty
                    <td colspan="6" class="text-center">Tidak ada data...</td>
                  @endforelse
                </tbody>
              </table>
              <br>
            <div class="btn-group">
                <a href="{{ route('welcome')}}" type="button" class="btn btn-danger">Kembali</a>
            </div>
            </div>
          </div>
        </div>
      </main>


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

