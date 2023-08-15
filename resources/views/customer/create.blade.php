<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Pendaftaran siswa</title>
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
                    <div class="card-header">Daftarkan Diri Anda!</div>
                    <div class="row">
                    <div class="card-body">
                    <form action="{{route('customers.store')}}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                                <div name="text" class="form-text">Sesuai KK</div>
                                @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="tel" class="form-control" name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin">
                                    <option selected disabled hidden></option>
                                    <option value="L"{{ old('jenis_kelamin')=='L' ? 'selected': '' }}>Laki-laki</option>
                                    <option value="P"{{ old('jenis_kelamin')=='P' ? 'selected': '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" name="telepon" value="{{ old('telepon') }}">
                                @error('telepon')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="lembaga" class="form-label">Kode Lembaga Kursus</label><br>
                                <?php
                                    $string = url()->previous();
                                    $split = explode("/", $string);
                                    $word = $split[count($split)-1];
                                ?>
                                <input type="text" class="form-control" name="index_lembaga" value="{{$word}}" readonly>
                            </div>
                            <div>
                                <label for="program" class="form-label">Program yang Dipilih</label><br>
                                <input type="text" class="form-control" name="program" value="{{ old('program') }}">
                                @error('program')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </form>
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

