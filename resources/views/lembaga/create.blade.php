
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Pendaftaran lembaga</title>
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

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-25">
                <div class="card">
                    <div class="card-header">Daftarkan Lembaga Anda!</div>
                        <div class="row">
                        <div class="card-body">
                        <form action="{{ route('lembagas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nomor_izin_operasional" class="form-label">Nomor Izin Operasional</label>
                                <input type="text" class="form-control" aria-label="izin" name="nomor_izin_operasional"
                                value="{{ old('nomor_izin_operasional') }}">
                                @error('nomor_izin_operasional')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                                <input type="text" class="form-control" aria-label="First name" name="nama_lembaga"
                                value="{{ old('nama_lembaga') }}">
                                @error('nama_lembaga')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nama_pimpinan" class="form-label">Nama Pemimpin</label>
                                <input type="text" class="form-control" aria-label="First name" name="nama_pimpinan"
                                value="{{ old('nama_pimpinan') }}">
                                @error('nama_pimpinan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Lembaga</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" col-md-6">
                                <label for="formphone" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" name="telepon" value="{{ old('telepon') }}">
                                @error('telepon')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="coursedescribtion" class="form-label">Deskripsi lembaga</label>
                                <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                                <div name="text" class="form-text">Termasuk program dan harganya</div>
                                @error('deskripsi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class=" mb-3">
                                <label for="foto" class="form-label">Foto Tampak Depan</label><br>
                                <input type="file" name="foto" value="{{ old('foto') }}">
                                @error('foto')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}" type="button" class="btn btn-danger">Kembali</a>
                    </div>
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

