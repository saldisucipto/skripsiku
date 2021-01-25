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
                    <div class="row">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-tile">Products Controller</h3>
                                <p class="panel-subtitle">Konfigurasi Products</p>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    {{-- <div class="col-sm-6">
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <p style="font-size: 20px" class="panel-subtitle text-center">Kategori
                                                    Products</p>
                                                <p class="panel-subtitle text-center">Konfigurasi Kategori Product</p>
                                                <div class="row">
                                                    <div class="text-center">
                                                        <p style="font-size: 50px"><a href="#"><span
                                                                    class="lnr lnr-layers"></span></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <p class="panel-subtitle">Products</p>
                                            </div>
                                        </div>
                                    </div> --}}

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
@endsection
