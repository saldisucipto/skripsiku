    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('logo.png') }}" alt="PT. Cipta Aneka Air" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/register"><i class="fa fa-user"></i> Register </a></li>
                            {{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a>
                            </li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            --}}
                            <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="corak-air">
        <div class="container">
            <div class="row">
                <div class="background-corak">
                    <img src="{{ asset('corak.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class=" @if ($routeName==='/' ) active @endif">Home</a></li>
                            @foreach ($parentNav as $item)
                                <li><a href="{{ $item->link }}" class="    @if ($routeName==$item->link) active @endif">{{ $item->title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->
