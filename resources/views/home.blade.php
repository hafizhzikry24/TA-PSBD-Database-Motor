@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            <div class="card mb-3">
                <div class="card-header bg-primary text-warning fs-4">{{ __('Database motor') }}</div>

                <div class="card-body bg-warning text-white  fs-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('berisis informasi database dari data diri pemebeli motor!') }}
                </div>

                <div class="card-body text-center bg-warning">
                    <a href={{ route('admin.index') }}  type="button" class="btn btn-secondary px-4 ">Data Pembeli</a>
                    {{-- <a href={{ route('pembelian.index') }}  type="button" class="btn btn-warning">Pembelian</a>
                    <a href={{ route('motor.index') }}  type="button" class="btn btn-primary">Motor</a> --}}


                </div>

            </div>
            <div class="card mt-3">


                <div class="card-body bg-warning text-white fs-5">
                    @if (session('status'))
                        <div class="alert alert-success " role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('berisi informasi database mengenai transaksi pembelian motor') }}
                </div>

                <div class="card-body text-center bg-warning">
                    {{-- <a href={{ route('admin.index') }}  type="button" class="btn btn-dark">Pembeli</a> --}}
                    <a href={{ route('pembelian.index') }}  type="button" class="btn btn-secondary px-4">Pembelian</a>
                    {{-- <a href={{ route('motor.index') }}  type="button" class="btn btn-primary">Motor</a> --}}


                </div>
            </div>
            <div class="card mt-3">


                <div class="card-body text-white bg-warning fs-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('berisi informasi mengenai database motor yang tersedia !') }}
                </div>

                <div class="card-body text-center bg-warning">
                    {{-- <a href={{ route('admin.index') }}  type="button" class="btn btn-dark">Pembeli</a> --}}
                    {{-- <a href={{ route('pembelian.index') }}  type="button" class="btn btn-warning">Pembelian</a> --}}
                    <a href={{ route('motor.index') }}  type="button" class="btn btn-secondary px-4">Data Motor</a>


                </div>
            </div>
    </div>
</div>




@endsection


