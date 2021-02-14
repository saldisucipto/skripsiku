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
                <div class="col-sm-8">
                    <div class="left-sidebar">
                        <h2>Keranjang</h2>
                        <div class="panel-group category-products" id="accordian">
                            {{ $produkOrder->nama_produk }}

                        </div>
                        <!--/shipping-->

                    </div>
                </div>
                {{-- End Product Info --}}

                {{-- Product Info --}}
                <div class="col-sm-4">
                    <div class="left-sidebar">
                        <h2>Order Detail</h2>
                        <div class="panel-group category-products" id="accordian">
                            @php
                                function rupiah($amount)
                                {
                                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                                    return $amountrupiah;
                                }

                            @endphp
                            <div class="product-info" style="margin: 5px">
                                {{-- <h3><strong>{{ $produkDetail->nama_produk }}</strong></h3>
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
                                </p> --}}
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
