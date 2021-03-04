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
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="text-align: center">
                                <i style="padding-top: 20px" class="fa fa-users fa-4x text-center"></i>
                                <div class="caption">
                                    <h3>Laporan Customer</h3>
                                    <p><a href="/laporan/customer" class="btn btn-primary" role="button">Laporan
                                            Customer</a> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="text-align: center">
                                <i style="padding-top: 20px" class="fa fa-cubes fa-4x text-center"></i>
                                <div class="caption">
                                    <h3>Laporan Produk</h3>
                                    <p><a href="/laporan/produk" class="btn btn-primary" role="button">Laporan
                                            Produk</a> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="text-align: center">
                                <i style="padding-top: 20px" class="fa fa-usd fa-4x text-center"></i>
                                <div class="caption">
                                    <h3>Laporan Pembayaran</h3>
                                    <p><a href="/laporan/pembayaran" class="btn btn-primary" role="button">Laporan
                                            Pembayaran</a> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="text-align: center">
                                <i style="padding-top: 20px" class="fa fa-archive fa-4x text-center"></i>
                                <div class="caption">
                                    <h3>Laporan Order</h3>
                                    <p><a href="/laporan/order" class="btn btn-primary" role="button">Laporan
                                            Order</a> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="text-align: center">
                                <i style="padding-top: 20px" class="fa fa-car fa-4x text-center"></i>
                                <div class="caption">
                                    <h3>Laporan Pengiriman</h3>
                                    <p><a href="/laporan/pengiriman" class="btn btn-primary" role="button">Laporan
                                            Pengririman</a> </p>
                                </div>
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
    <!-- END MAIN -->
    {{-- start footer --}}
    {{-- @include('layouts.backend.footer') --}}
    {{-- End Footer --}}
    </div>


    </div>

@endsection
