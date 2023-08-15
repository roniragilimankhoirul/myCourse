
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>{{$lembaga->nama_lembaga}}</title>
    <style>
        .bg-1 {
            background-color: rgb(58, 20, 95);
            color: #a8dcff;
        }

        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
  </head>
<body>
    <nav class="navbar navbar-light bg-1">
        <div class="container-fluid ">
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


    <main class=" p-4">
        <br>
        <div class="container">
            <img src="{{asset('storage/'.$lembaga->foto)}}" alt="{{$lembaga->foto}}" style="max-width: 360px;min-width: 144px">
        </div>
        <h2><b>{{$lembaga->nama_lembaga}}</b></h2>
        <div>
            <table class="table table-borderless">
                <tr><td class=" w-25">Alamat </td><td> : </td><td> {{$lembaga->alamat}}</td></tr>
                <tr><td class=" w-25">Nama Pimpinan </td> <td> : </td> <td> {{$lembaga->nama_pimpinan}}</td></tr>
                <tr><td class=" w-25">Telepon </td> <td> : </td> <td> {{$lembaga->telepon}}</td></tr>
                <tr><td class=" w-25">Email </td> <td> : </td> <td> {{$lembaga->email}}</td></tr>
                <tr><td class=" w-25">Deskripsi </td> <td> : </td> <td> {{$lembaga->deskripsi}}</td></tr>
            </table>
            <div class="btn-group">
                <a href="{{ route('customers.create')}}" type="button" class="btn btn-outline-dark">Daftar</a>
            </div>
        </div>

        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">
        <h3 class="text-center">Komentar</h3>
        <div class="card border-secondary">
          <div class="card-body"  style="height: 250px; overflow: auto">
            <table class="table">
                <tbody>
                    @forelse ($komentars as $komentar)
                  <tr>
                    <td>{{$komentar->nama}} | {{$komentar->email}} | {{$komentar->komentar}}</td>
                  </tr>
                  @empty
                    <td class="text-center">Tidak ada komentar...</td>
                  @endforelse
                </tbody>
            </table>
          </div>
        </div>
        <div class="container-fluid px-5">

        </div>
        <hr class="featurette-divider">

        <div class="container">
            <h3 class="text-center">Ulasan</h3>
            <p class="text-center"><em>Berikan ulasan anda!</em></p>
            <div class="row test text-start">
                <div class="col-md-12">
                    <form action="{{route('komentars.store')}}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <input class="form-control" id="lembaga" name="lembaga" type="text" value="{{ $lembaga->nama_lembaga }}" readonly>
                            </div>
                        </div>
                        <br>
                        <textarea class="form-control" id="komentar" name="komentar" placeholder="Comment" rows="5" value="{{ old('komentar') }}"></textarea>
                        @error('komentar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn btn-outline-secondary" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="btn-group">
            <a href="{{ route('lembagas.home')}}" type="button" class="btn btn-danger">Kembali</a>
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

