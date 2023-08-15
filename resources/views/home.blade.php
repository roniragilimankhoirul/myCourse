@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body flex-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><hr>
                    <div class=" btn-group-vertical modal-dialog-centered m-2">
                        <a href="{{ route('admins')}}" type="button" class="btn btn-primary">Menuju Halaman Admin</a>
                    </div>
                    <div class=" btn-group-vertical modal-dialog-centered m-2">
                        <a href="{{ route('welcome')}}" type="button" class="btn btn-danger">Kembali ke Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
