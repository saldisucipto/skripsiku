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
                            <h3 class="panel-title">Laporan Order</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered data">
                                    <thead>
                                        <tr>
                                            <th>Nomer Order</th>
                                            <th>Pengririman</th>
                                            <th>Customer</th>
                                            <th>Invoice</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->id_order }}</td>
                                                <td>{{ $item->pengiriman->nama_pengiriman }}</td>
                                                <td>{{ $item->customer->nama_lengkap }}</td>
                                                <td>{{ $item->id_invoice }}</td>
                                                <td>{{ $item->catatan }}</td>
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
