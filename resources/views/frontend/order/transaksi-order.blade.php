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
                        <h2>List Keranjang</h2>
                        <div class="panel-group category-products" id="accordian">
                            @forelse ($data as $item)
                                @foreach ($item->produk as $produk)
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-sm-4">
                                                <img style=" width: 50%; display: block; margin: 0 auto;"
                                                    src="/produk/images/{{ $produk->foto_produk }}"
                                                    alt="{{ $produk->nama_produk }}">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                                            <p class="card-text">Part Number :
                                                                <b>{{ $produk->part_number }}</b>
                                                            </p>
                                                            <p class="card-text">Qty Order : {{ $item->qty_orders }}
                                                            </p>
                                                            <p style="display: none" class="harga-produk">
                                                                {{ $produk->harga_produk }}</p>
                                                            <p class="card-text">{{ rupiah($produk->harga_produk) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-6" id="delKeranjang">

                                                            <a role="button" class="text-danger"
                                                                onclick="deleteItem({{ $item->id_trksi_order }})"><i
                                                                    class="fa fa-trash-o fa-2x"></i>
                                                                Hapus Dari Keranjang</a>

                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @empty
                                <h4 class="text-center"><b>Kamu Belum Menambahkan Barang Apapun !!</b></h4>
                            @endforelse
                        </div>
                    </div>


                    <!--/shipping-->

                </div>

                {{-- End Product Info --}}
                {{-- Product Info --}}
                <div class="col-sm-4">
                    <div class="left-sidebar">
                        <h2>Pilih Pengiriman</h2>
                        <div class="panel-group category-products" id="accordian">
                            <div class="product-info" style="margin: 5px">
                                <p>
                                <h4><b>Pilih Pengiriman:</b></h4>
                                </p>
                                <select name="id_pengiriman" id="pengiriman" class="form-control">
                                    <option aria-readonly="true">Pilih Pengiriman</option>
                                    @foreach ($pengiriman as $item)
                                        <option value="{{ $item->id_metode_pengiriman }}">{{ $item->nama_pengiriman }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--/shipping-->

                    </div>
                </div>
                {{-- End Product Info --}}

                {{-- Product Info --}}
                <div class="col-sm-4">
                    <div class="left-sidebar">
                        <h2>Ringkasan Order</h2>
                        <div class="panel-group category-products" id="accordian">
                            <div class="product-info" style="margin: 5px">
                                <p>
                                <h4><b>Order Detail :</b></h4>
                                </p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        Total Item ({{ count($data) }})
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Total Harga</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><b id="total-harga-keranjang"></b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Biaya Pengiriman</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><b id="hrg-pengiriman"></b></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>PPN (10%)</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><b id="ppn"></b></h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4><b>Total</b>
                                            <h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><b id="total"></b></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a role="button" id="makeorder" class="btn btn-block btn-primary">Make Order</a>
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
