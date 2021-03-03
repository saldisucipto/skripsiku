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
                                        <h3 class="panel-tile">Pengiriman Controller</h3>
                                        <p class="panel-subtitle">Atur Pengiriman Barang By Invoice</p>
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
                                            <table class="table table-striped table-bordered data">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Invoice</th>
                                                        <th>Metode Pembayaran</th>
                                                        <th>Nama Customer</th>
                                                        <th>Total</th>
                                                        <th>Verify By</th>
                                                        <th>Tanggal Diverifikasi</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $item->id_invoice }}</td>
                                                            <td>{{ $item->pembayaran->nama_metode }} ||
                                                                {{ $item->pembayaran->account_number }}</td>
                                                            <td>{{ $item->customer->nama_lengkap }}</td>
                                                            <td>{{ rupiah($item->jumlah_pembayaran) }}</td>
                                                            <td>{{ $item->verify_by }}</td>
                                                            <td>{{ $item->tanggal }}</td>



                                                            <td class="text-center"><a
                                                                    href="/proses-pengiriman/{{ $item->id_invoice }}"
                                                                    class="btn btn-xs btn-primary"><i class="fa fa-eye"></i>
                                                                    Proses Pengiriman</a></td>
                                                        </tr>
                                                        {{-- Edit modal Pengiriman --}}
                                                        <div class="modal fade"
                                                            id="editPengiriman{{ $item->id_metode_pengiriman }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="createPengirimanBaruLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content" style="overflow: hidden;">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">×</button>
                                                                        <h4 class="modal-title"
                                                                            id="createPengirimanBaruLabel">Edit Metode
                                                                            Pengiriman Baru</h4>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="max-height: 482.4px; overflow-y: auto;">
                                                                        <form
                                                                            action="/metode-pengiriman/edit/{{ $item->id_metode_pengiriman }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label">Nama
                                                                                    Pengiriman</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text"
                                                                                        name="nama_pengiriman"
                                                                                        placeholder="Nama Pengiriman"
                                                                                        value="{{ $item->nama_pengiriman }}"
                                                                                        class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label">Area
                                                                                    Pengiriman</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control"
                                                                                        name="jarak_pengiriman">
                                                                                        <option disabled selected
                                                                                            aria-readonly="true"><i
                                                                                                class="fa fa-trash"></i>Pilih
                                                                                            Jarak
                                                                                            Produk</option>
                                                                                        <option value="jabodetabek"><i
                                                                                                class="fa fa-trash"></i>
                                                                                            Jabodetabek
                                                                                        </option>
                                                                                        <option value="luar-jabodetabek"><i
                                                                                                class="fa fa-trash"></i>
                                                                                            Luar
                                                                                            Jabodetabek
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        {{-- End Modal --}}
                                                    @endforeach
                                                </tbody>
                                            </table>
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
