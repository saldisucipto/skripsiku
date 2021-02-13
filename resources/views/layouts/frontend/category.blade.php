<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            @foreach ($categoryproduct as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="/kategori/{{ $item->link }}"><i class="fa fa-arrow-right">
                                    &nbsp;
                                </i>{{ $item->nama_kategori }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="shipping text-center">
            <!--shipping-->
            <img src="{{ asset('assets/frontend/images/home/shipping.jpg') }}" alt="" />
        </div>
        <!--/shipping-->

    </div>
</div>
