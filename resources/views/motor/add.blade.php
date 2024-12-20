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

            <h5 class="card-title fw-bolder mb-3 fs-5 text-warning">Tambah motor Mahal</h5>

            <form method="post" action="{{ route('motor.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_motor" class="form-label fs-5 text-warning">ID Motor</label>
                    <input type="text" class="form-control" id="id_motor" name="id_motor">
                </div>

                <div class="mb-3">
                    <label for="warna" class="form-label fs-5 text-warning">warna</label>
                    <input type="text" class="form-control" id="warna" name="warna">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label fs-5 text-warning">harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label fs-5 text-warning">tipe</label>
                    <input type="text" class="form-control" id="tipe" name="tipe">
                </div>
                <div class="mb-3">
                    <label for="id_pembelian" class="form-label fs-5 text-warning">id_pembelian</label>
                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Tambah" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
