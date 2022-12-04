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

            <h5 class="card-title fw-bolder mb-3 fs-5 text-warning">Ubah Data Pembelian</h5>

            <form method="post" action="{{ route('pembelian.update', $data->id_pembelian) }}">
                @csrf
                <div class="mb-3">
                    <label for="id_pembelian " class="form-label fs-5 text-warning">ID motor</label>
                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ $data->id_pembelian }}">
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label fs-5 text-warning">jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label fs-5 text-warning">tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $data->tahun }}">
                </div>
                <div class="mb-3">
                    <label for="id_pembeli" class="form-label fs-5 text-warning">id_pembeli</label>
                    <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" value="{{ $data->id_pembeli }}">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Ubah" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
