<section>
    <div class="container">
        <div class="row">
            @include('layouts.frontend.category')

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Product Items</h2>
                    @php
                        function rupiah($amount)
                        {
                            $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                            return $amountrupiah;
                        }

                    @endphp

                    @foreach ($produk as $item)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/produk/images/{{ $item->foto_produk }}"
                                            alt="{{ $item->nama_produk }}" />
                                        <h2>{{ rupiah($item->harga_produk) }}</h2>
                                        <p>{{ $item->nama_produk }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Order Barang Ini</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Tambahkan ke Keranjang</a></li>
                                        {{-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="item active">
                                @foreach ($produkrecomended as $item)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="/produk/images/{{ $item->foto_produk }}" alt="" />
                                                    <h2>{{ rupiah($item->harga_produk) }}</h2>
                                                    <p>{{ $item->nama_produk }}</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Order Barang Ini</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
