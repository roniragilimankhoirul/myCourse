<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Data Diri Pendaftar</title>
  </head>
  <style>
    .bg-1 {
        background-color: rgb(58, 20, 95);
        color: #a8dcff;
        text-align: center;
        border-radius: 10px;
        font-size: 30px;
        width: 250px;
        height: 66px;
    },
    .container1{
        background-color: #dfdfdf;
        color: black;
        border: 2px solid black;
        text-indent: 5px;
        font-family: sans-serif;
    },
    .container2{
        background-color:#fafafa;
        color: black;
        border: 2px solid black;
        text-indent: 2px;
        font-family: serif;
    }
</style>
  <body>
    <main class=" p-4">
            <div class="container1">
                <b>Data Diri Pendaftar <br></b>
            </div>
            <div class="container2">
                <table class="table table-borderless">
                    <tr><td>Nama </td><td> : </td><td> {{$customer->nama}}</td></tr>
                    <tr><td>NIK </td> <td> : </td> <td> {{$customer->nik}}</td></tr>
                    <tr><td>Jenis Kelamin </td> <td> : </td> <td> {{$customer->jenis_kelamin}}</td></tr>
                    <tr><td>Nomor Telepon </td> <td> : </td> <td> {{$customer->telepon}}</td></tr>
                    <tr><td>Email </td> <td> : </td> <td> {{$customer->email}}</td></tr>
                    <?php
                        $word = DB::table('lembagas')->whereIn('id',[$customer->index_lembaga])->select('nama_lembaga')->get();
                        $split = explode('"', $word);
                        $lembagaNama = $split[count($split)-2];
                    ?>
                    <tr><td>Index Lembaga </td> <td> : </td> <td> {{$lembagaNama}}</td></tr>
                    <tr><td>Program yang Dipilih </td> <td> : </td> <td> {{$customer->program}}</td></tr>
                </table>
            </div><br><br><br>
            <div class="bg-1">
                <b>MyCourse</b>
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
