@extends('layouts.app')





@section('content')
<div class="container">

    <form class = "row mt-3 ml-3 justify-content-center; "action="" method="GET">
        <div class="input-group mb-3">
            <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-info text-white" type="submit" id="button-addon2">Search</button>
          </div>
    </form>

    <h4 class="mt-5 text-white">Data Motor</h4>

    <a href="{{ route('motor.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

    @if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
    @endif



    <table class="table table-hover mt-2 bg-primary rounded-3 text-warning">
        <thead>
            <tr>
                <th>No.</th>
                <th>warna</th>
                <th>harga</th>
                <th>tipe</th>
                <th>jumlah pembelian</th>
                <th>tahuns pembelian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_motor }}</td>
                <td>{{ $data->warna }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->tipe }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->tahun }}</td>
                <td>
                    <a href="{{ route('motor.edit', $data->id_motor) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_motor }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_motor }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('motor.delete', $data->id_motor) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#softdeletemodal{{ $data->id_motor }}">
                        Softdelete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softdeletemodal{{ $data->id_motor }}" tabindex="-1" aria-labelledby="softdeletemodalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softdeletemodalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('motor.softdelete', $data->id_motor) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}

        </tbody>
    </table>
    <h4 class="text-white">Restore</h4>
    <table class="table table-hover mt-2 bg-primary rounded-3 text-warning">
        <thead>
            <tr>
                <th>No.</th>
                <th>warna</th>
                <th>harga</th>
                <th>tipe</th>
                <th>jumlah pembelian</th>
                <th>tahuns pembelian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deleted as $data)
            <tr>
                <td>{{ $data->id_motor }}</td>
                <td>{{ $data->warna }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->tipe }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->tahun }}</td>
                <td>
                    <a href="{{ route('motor.restore', $data->id_motor) }}" type="button" class="btn btn-warning rounded-3">restore</a>
                </td>
            </tr>

                    @endforeach
        </tbody>
        </table>
</div>
@endsection
