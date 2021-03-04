@extends('layouts.backend.master')

@section('content')
    <div id="wrapper">
        {{-- Start Header --}}
        @include('layouts.backend.header')
        {{-- End Header --}}
        <!-- LEFT SIDEBAR -->
        @include('layouts.backend.sidebar')
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        @php
            function rupiah($amount)
            {
                $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                return $amountrupiah;
            }

        @endphp

        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    @if (Session::has('pesan_sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <i class="fa fa-check-circle"></i> {!! session('pesan_sukses') !!}
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan Produk</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered data">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Part Number</th>
                                            <th>Stok Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                            <tr>
                                                <td>{{ $item->nama_produk }}</td>
                                                <td>{{ $item->kategori->nama_kategori }}</td>
                                                <td>{{ $item->deskripsi_produk }}</td>
                                                <td>{{ rupiah($item->harga_produk) }}</td>
                                                <td>{{ $item->part_number }}</td>
                                                <td>{{ $item->stok_barang }}</td>
                                            </tr>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    </div>
    </div>
@endsection
