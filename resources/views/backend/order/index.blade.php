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
            @php
                function rupiah($amount)
                {
                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                    return $amountrupiah;
                }

            @endphp
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
                    <div class="panel panel-headline">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 table-data">
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Orders List</h3>
                                            <span>List Orders Customers</span>
                                            <br>
                                            <br>
                                        </div>
                                        <div class="panel-body">
                                            <table id="dataNavigasi" class="table table-striped table-bordered data">
                                                <thead>
                                                    <tr>
                                                        <th>No Order</th>
                                                        <th>Total Amounts</th>
                                                        <th>Nama Customers</th>
                                                        <th>Pengiriman</th>
                                                        <th>Catatan</th>
                                                        <th>Status Invoice</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_ORDER as $item)
                                                        <tr>
                                                            <td>{{ $item->id_order }}</td>
                                                            <td>{{ rupiah($item->total) }}</td>
                                                            <td>{{ $item->customer->nama_lengkap }}</td>
                                                            <td>{{ $item->pengiriman->nama_pengiriman }}</td>
                                                            <td>{{ $item->catatan }}</td>
                                                            <td>
                                                                @if (!$item->id_invoice == null)
                                                                    <span class="label label-primary">Sudah di Checkout
                                                                    </span> <span class="label label-success"> No.Invoice =
                                                                        {{ $item->id_invoice }}</span>
                                                                @else
                                                                    <span class="label label-warning">Belum Di
                                                                        Checkout</span>
                                                                @endif
                                                            </td>

                                                            <td class="text-center"><a href="#" class="btn btn-sm btn-info"
                                                                    data-toggle="modal"
                                                                    data-target="#modalEdit{{ $item->id_order }}"><i
                                                                        class="fa fa-eye"></i>
                                                                    Show Orders</a></td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalEdit{{ $item->id_order }}"
                                                            tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">
                                                                            <div class="header"
                                                                                style="margin-top: 10px; margin-bottom:10px;">
                                                                                <div class="content-header">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <img class="img-responsive"
                                                                                                src="{{ asset('logo.png') }}"
                                                                                                alt="PT. Cipta Aneka Air" />

                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <h3><b><u>ORDERS
                                                                                                        TRANSACTION</u></b>
                                                                                            </h3>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <h4>Orders Number :
                                                                                                <b>{{ $item->id_order }}</b>
                                                                                            </h4>
                                                                                            <h4>Customers :
                                                                                                <b>{{ $item->customer->nama_lengkap }}</b>
                                                                                            </h4>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <h4>Tanggal :
                                                                                                <b>{{ $item->created_at }}</b>
                                                                                            </h4>
                                                                                            <h4>
                                                                                                Pengiriman :
                                                                                                <b>{{ $item->pengiriman->nama_pengiriman }}</b>
                                                                                            </h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @foreach ($item->transaksi as $itemTransaksi)
                                                                            @foreach ($itemTransaksi->produk as $item1)
                                                                                <div class="card">
                                                                                    <div class="row no-gutters">
                                                                                        <div class="col-sm-4">
                                                                                            <img style=" width: 50%; display: block; margin: 0 auto;"
                                                                                                src="/produk/images/{{ $item1->foto_produk }}"
                                                                                                alt="{{ $item1->nama_produk }}">
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6">
                                                                                                        <h4>{{ $item1->nama_produk }}
                                                                                                        </h4>
                                                                                                        <h5>
                                                                                                            Part Number :
                                                                                                            <b>{{ $item1->part_number }}</b>
                                                                                                        </h5>
                                                                                                        <h5>
                                                                                                            Harga Produk :
                                                                                                            <b>{{ rupiah($item1->harga_produk) }}</b>
                                                                                                        </h5>
                                                                                                        <h5>
                                                                                                            Deskripsi Produk
                                                                                                            :
                                                                                                            <b>{{ $item1->deskripsi_produk }}</b>
                                                                                                        </h5>
                                                                                                    </div>
                                                                                                    <div class="col-sm-6">
                                                                                                        <h3>
                                                                                                            QTY ORDER:
                                                                                                            <b>{{ $itemTransaksi->qty_orders }}
                                                                                                                Unit</b>
                                                                                                        </h3>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>
                                                                            @endforeach
                                                                        @endforeach
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <h5>Catatan Orders</h5>
                                                                                <p>
                                                                                    <b>
                                                                                        {{ $item->catatan }}</b>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="summary-orders">
                                                                                    <h5>Sub Total :
                                                                                        <b>{{ rupiah($item->sub_total) }}</b>
                                                                                    </h5>
                                                                                    <h5>PPN (10%) :
                                                                                        <b>{{ rupiah($item->ppn) }}</b>
                                                                                    </h5>
                                                                                    <h4>
                                                                                        Grand Total :
                                                                                        <b>{{ rupiah($item->total) }}</b>
                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
        @include('layouts.backend.footer')
        {{-- End Footer --}}
    </div>
    <!-- Modal -->
    </div>
@endsection
