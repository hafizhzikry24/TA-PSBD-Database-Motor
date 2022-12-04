@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>
    @endif

    <div class="card mt-4 bg-primary">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3 fs-5 text-warning">Tambah Pembeli</h5>

            <form method="post" action="{{ route('admin.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_pembeli" class="form-label fs-5 text-warning">ID Pembeli</label>
                    <input type="text" class="form-control" id="id_pembeli" name="id_pembeli">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label fs-5 text-warning">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label fs-5 text-warning">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fs-5 text-warning">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fs-5 text-warning">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Tambah" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
