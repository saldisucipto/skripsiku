@extends('layouts.frontend.master')

@section('content')
    {{-- Startd Header --}}
    @include('layouts.frontend.header')
    {{-- End Header --}}
    {{-- Section --}}
    <section>
        <div class="container">
            @php
                function rupiah($amount)
                {
                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                    return $amountrupiah;
                }
            @endphp
            <div class="row">
                {{-- Product Info --}}
                <div class="col-sm-8">
                    <div class="left-sidebar">
                        <h2>List Order</h2>
                        <div class="panel-group category-products" id="accordian">
                            @foreach ($data as $item)
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-sm-4">
                                            <div style="display: block; margin: 0 auto; text-align:center"
                                                class="card-body">
                                                <h4><b>No Orders</b></h4>
                                                <h5>{{ $item->id_order }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="card-text"> PENGIRIMAN :
                                                            <b> {{ $item->pengiriman->nama_pengiriman }} </b>
                                                        </p>
                                                        <p class="total-orders" style="display: none">{{ $item->total }}
                                                        </p>
                                                        <p class="card-text">TOTAL : <b>{{ rupiah($item->total) }}</b>
                                                        </p>
                                                        </p>
                                                        <p class="card-text"> CATATAN ORDER : <b>{{ $item->catatan }}</b>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <a role="button" class="text-danger"><i
                                                                class="fa fa-trash-o fa-2x"></i>
                                                            Hapus Dari Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <!--/shipping-->
                </div>
                {{-- Product Info --}}
                <div class="col-sm-4">
                    <div class="left-sidebar">
                        <h2>Metode Pembayaran</h2>
                        <div class="panel-group category-products" id="accordian">
                            <select onchange="getNewVal(this);" id="id_metode_pembayaran" class="form-control">
                                <option aria-readonly="true"> Pilih Account Untuk Pembayaran</option>
                                @foreach ($metode_pembayaran as $item)
                                    <option value="{{ $item->id_metode }}" class="form-control">{{ $item->nama_metode }}
                                        |
                                        {{ $item->account_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--/shipping-->
                    </div>
                </div>
                {{-- End Product Info --}}
                {{-- Product Info --}}
                <div class="col-sm-4">
                    <div class="left-sidebar">
                        <h2>SUMARRY</h2>
                        <div class="panel-group category-products" id="accordian">
                            <div class="product-info" style="margin: 5px">
                                <p>
                                <h4><b>Total Order :</b></h4>
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        Total Order (Nomor Orders) ({{ count($data) }})
                                    </div>
                                    {{-- <div class="col-sm-6"></div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4><b>Total Amount (Include Tax 10%)</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><b id="total-harga-keranjang"></b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3><b id="total-amount"></b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a role="button" id="button-cekout" class="btn btn-block btn-primary">CHECKOUT YOUR
                                        ORDERS</a>
                                </div>
                            </div>
                        </div>
                        <!--/shipping-->
                    </div>
                </div>
                {{-- End Product Info --}}
            </div>
        </div>
    </section>

    {{-- Ens Section --}}
    {{-- Footer Start --}}
    @include('layouts.frontend.footer')
    {{-- End Footer --}}

@endsection
