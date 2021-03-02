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
                                        <h3 class="panel-tile">Verifikasi Pembayaran</h3>
                                        {{-- <p class="panel-subtitle">Master </p> --}}
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
                                                        <th>No</th>
                                                        <th>Invoice Number</th>
                                                        <th>Nama Customers</th>
                                                        <th>Metode Pembayaran</th>
                                                        <th>Amount</th>
                                                        <th>Tanggal</th>
                                                        <th>Verifikasi</th>
                                                        <th>Verifikasi By</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <th scope="row">{{ $no++ }}</th>
                                                            <td>{{ $item->id_invoice }} | <span
                                                                    class="label label-primary"><a
                                                                        style="text-decoration: none; color:white"
                                                                        href="/invoice/{{ $item->id_invoice }}">Clik
                                                                        Here, For
                                                                        Detail</a></span></td>
                                                            <td>{{ $item->customer->nama_lengkap }}</td>
                                                            <td>{{ $item->pembayaran->nama_metode }} |
                                                                {{ $item->pembayaran->account_number }}
                                                            </td>

                                                            <td>{{ rupiah($item->jumlah_pembayaran) }}</td>
                                                            <td>{{ $item->tanggal }}</td>
                                                            <td>
                                                                <a onclick="verifikasiPembayaran({{ $item->id_invoice }})"
                                                                    class="btn btn-sm btn-warning">Verifikasi
                                                                    Pembayaran</a>
                                                            </td>
                                                            <td>
                                                                @if ($item->id_user == null)
                                                                    <span class="label label-danger">Belum
                                                                        Diverifikasi</span>
                                                                @else
                                                                    <span class="label label-primary">Verifikasi By.</span>
                                                                    {{ $item->verify_by }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        {{-- Edit modal Pengiriman --}}
                                                        <div class="modal fade" id="editPengiriman{{ $item->id_metode }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="createMetodePembayarnLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content" style="overflow: hidden;">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">×</button>
                                                                        <h4 class="modal-title"
                                                                            id="createMetodePembayarnLabel">Edit Metode
                                                                            Pengiriman Baru</h4>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="max-height: 482.4px; overflow-y: auto;">
                                                                        <form
                                                                            action="/metode-pembayaran/edit/{{ $item->id_metode }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label">Nama
                                                                                    Pengiriman</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="nama_metode"
                                                                                        placeholder="Nama Metode Pembayaran"
                                                                                        value="{{ $item->nama_metode }}"
                                                                                        class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label">Account
                                                                                    Number</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control"
                                                                                        value="{{ $item->account_number }}"
                                                                                        placeholder="233-2512-222"
                                                                                        name="account_number">
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
    <div class="modal fade" id="createMetodePembayarn" tabindex="-1" role="dialog"
        aria-labelledby="createPengirimanBaruLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="createPengirimanBaruLabel">Tambah Metode Pembayaran Baru</h4>
                </div>
                <div class="modal-body" style="max-height: 482.4px; overflow-y: auto;">
                    <form action="/account-number" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Pembayaran</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_metode" placeholder="Nama Pembayaran" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Account Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="account_number" placeholder="233-2512-222">
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
