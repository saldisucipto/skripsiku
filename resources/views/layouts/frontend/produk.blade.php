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
                                        <a href="/produk/{{ $item->slug }}"> <img
                                                style="height: 268px; weight: 249px;"
                                                src="/produk/images/{{ $item->foto_produk }}"
                                                alt="{{ $item->nama_produk }}" /></a>
                                        <h2><a href="/produk/{{ $item->slug }}"
                                                class="nama-produk">{{ $item->nama_produk }}</a></h2>
                                        <p>{{ rupiah($item->harga_produk) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{ $produk->links() }}
                </div>

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">Kategori items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="item active">
                                @foreach ($categoryproduct as $item)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="height: 268px; weight: 249px;"
                                                        src="/produk/images/{{ $item->foto_kategori }}" alt="" />
                                                    <p>{{ $item->nama_kategori }}</p>
                                                    <a href="#" style="padding: 10px"
                                                        class="btn btn-sm btn-block btn-default"><i
                                                            class="fa fa-eye">&nbsp;</i>Detail</a>
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
