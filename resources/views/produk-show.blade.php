@extends('layouts.frontend.master')

@section('content')
    {{-- Startd Header --}}
    @include('layouts.frontend.header')
    {{-- End Header --}}
    {{-- Section --}}
    <section>
        <div class="container">
            <div class="row">
                {{-- Product Info --}}
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Product Foto Detail</h2>
                        <div class="panel-group category-products" id="accordian">
                            <div class="image-product">
                                <img src="\produk\images\{{ $produkDetail->foto_produk }}" alt="" class="img-responsive">
                            </div>
                        </div>
                        <!--/shipping-->

                    </div>
                </div>
                {{-- End Product Info --}}

                {{-- Product Info --}}
                <div class="col-sm-6">
                    <div class="left-sidebar">
                        <h2>Product Information Detail</h2>
                        <div class="panel-group category-products" id="accordian">
                            @php
                                function rupiah($amount)
                                {
                                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                                    return $amountrupiah;
                                }

                            @endphp
                            <div class="product-info" style="margin: 5px">
                                <h3><strong>{{ $produkDetail->nama_produk }}</strong></h3>
                                <p style="font-size: 12px; font-weight:bold;">Terjual: <span class="value">200</span>
                                    Diskusi :
                                    <span class="value">(2)</span>
                                </p>
                                <p id="hargabarang">{{ $produkDetail->harga_produk }}</p>
                                <h3><strong class="value"
                                        style="font-weight: bold;">{{ rupiah($produkDetail->harga_produk) }}</strong>
                                </h3>
                                <hr>
                                <h4 class="judul-page"><b>Detail Produk</b></h4>

                                <p>Kategori : <strong class="value">{{ $produkDetail->kategori->nama_kategori }}</strong>
                                </p>
                                <p>Stok : <strong class="value">{{ $produkDetail->stok_barang }}</strong></p>
                                <p>Part Number : <strong class="value">{{ $produkDetail->part_number }}</strong></p>
                                <h5 style="font-weight:bold; text-decoration:underline">Deskripsi Produk</h5>
                                <p class="deskripsi-produk">
                                    {{ $produkDetail->deskripsi_produk }}
                                </p>


                            </div>
                        </div>
                        <!--/shipping-->

                    </div>
                </div>
                {{-- End Product Info --}}
                {{-- Order Detial --}}
                <div class="col-sm-3 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Order This Product</h2>
                        <div class="container-order">
                            <p class="header-order">Atur Jumlah Pesanan</p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <form action="{{ route('transaksi.order') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="id_produk" name="id_produk"
                                            value=" {{ $produkDetail->id_produk }}">
                                        <input type="number" min="1" value="1" class="form-control input-sm"
                                            name="qty_orders" id="qty-order">
                                        @if (Auth::guard('customer')->check())
                                            <input type="hidden" name="id_customer" id="id_customer"
                                                value="{{ Auth::guard('customer')->user()->id_customers }}">
                                        @endif

                                </div>
                                <div class="col-sm-8">
                                    <p>Max Pembelian 100 Pcs</p>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-sm-4" style="text-align: start">
                                    Sub Total
                                </div>
                                <div class="col-sm-6" style="text-align: start">
                                    <p>Rp. <span id="sub-total">0</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button id="tambahKeranjang" type="button" role="button"
                                        class="btn btn-primary btn-block">
                                        <i class="fa fa-plus"></i> Tambah Ke Keranjang
                                    </button>

                                </div>
                                <div class="col-sm-12" type="submit">
                                    <button class="btn btn-primary btn-block">
                                        Langsung Order
                                    </button>
                                </div>
                                </form>

                            </div>
                            <div class="row" style="margin: 10px">
                                <div class="col-sm-4">
                                    <i class="fa fa-comments-o">&nbsp;Chat</i>
                                </div>
                                <div class="col-sm-4">
                                    <i class="fa fa-heart">&nbsp;Wishlist</i>
                                </div>
                                <div class="col-sm-4">
                                    <i class="fa fa-share">&nbsp;Share</i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- End Order --}}
            </div>
        </div>
    </section>

    {{-- Ens Section --}}
    {{-- Footer Start --}}
    @include('layouts.frontend.footer')
    {{-- End Footer --}}

@endsection
