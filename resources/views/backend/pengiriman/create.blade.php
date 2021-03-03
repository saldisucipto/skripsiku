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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="panel-tile">Proses Pengiriman</h3>
                                        <p class="panel-subtitle">Nomor Invoice {{ $data->id_invoice }}</p>
                                    </div>
                                </div>
                            </div>
                            @php
                                function rupiah($amount)
                                {
                                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                                    return $amountrupiah;
                                }
                            @endphp
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-12">
                                        <div class="panel-body">
                                            <form action="/proses-pengiriman/{{ $data->id_invoice }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="">ID INVOICE</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="id_invoice"
                                                            value="{{ $data->id_invoice }}" readonly placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="">ID User Pengirim</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="id_user"
                                                            value="{{ $data->id_user }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="">Penerima</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" name="id_customer"
                                                            value="{{ $data->id_customer }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="">Catatan Pengiriman</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea name="catatan_pengiriman" id="" cols="30"
                                                            name="catatan_pengiriman" class="form-control"
                                                            rows="10">Catatan Pengririman</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <button type="submit" class="btn btn-sm btn-primary">Create
                                                            Pengiriman</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    </div>
    {{-- Modal --}}
    {{-- Create modal --}}
    <div class="modal fade" id="createPengirimanBaru" tabindex="-1" role="dialog"
        aria-labelledby="createPengirimanBaruLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="createPengirimanBaruLabel">Tambah Metode Pengiriman Baru</h4>
                </div>
                <div class="modal-body" style="max-height: 482.4px; overflow-y: auto;">
                    <form action="/metode-pengiriman" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Pengiriman</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_pengiriman" placeholder="Nama Pengiriman" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Area Pengiriman</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jarak_pengiriman">
                                    <option disabled selected aria-readonly="true"><i class="fa fa-trash"></i>Pilih Jarak
                                        Produk</option>
                                    <option value="jabodetabek"><i class="fa fa-trash"></i> Jabodetabek
                                    </option>
                                    <option value="luar-jabodetabek"><i class="fa fa-trash"></i> Luar
                                        Jabodetabek
                                    </option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal --}}
@endsection
