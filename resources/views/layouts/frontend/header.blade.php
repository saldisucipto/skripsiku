    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <!--/header-middle-->

            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('logo.png') }}" alt="PT. Cipta Aneka Air" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Auth::guard('customer')->check())
                                <li style="padding-top: 10px" class="dropdown"><a href="" class="active">
                                        Hallo, {{ Auth::guard('customer')->user()->nama_lengkap }}<i
                                            class="fa fa-angle-down"></i>
                                        <p style="display: none" id="id_customer">
                                            {{ Auth::guard('customer')->user()->id_customers }}</p>
                                    </a>
                                    <ul role="menu" class="sub-menu"
                                        style="box-shadow: 0px 0px 0px 0px #fff; padding-top: 10px;">
                                        <li class="text-right"><a class="text-bold" style="text-decoration:none"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power-off"></i> Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout.customers') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li><a href="/register-customers"><i class="fa fa-user"></i> Register </a></li>
                                <li><a href="{{ route('customer.login') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif

                        </ul>

                    </div>

                    @if (Session::has('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert"
                            style="position: absolute; top: 50px; right: 0;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <i class="fa fa-check-circle"></i> {!! session('sukses') !!}
                        </div>
                    @endif
                    @if (Session::has('logout'))
                        <div class="alert alert-danger alert-dismissible" role="alert"
                            style="position: absolute; top: 50px; right: 0;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <i class="fa fa-exclamation-triangle"></i> {!! session('logout') !!}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </div>


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
                                @if (count($item->navigasi) > 0)
                                    <li class="dropdown"><a href="{{ $item->link }}" class="
                                         @if ($routeName==$item->link) active @endif">{{ $item->title }} <span style="background-color: red"
                                                class="badge rounded-pill jumlah-keranjang"></span><i
                                                class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            @foreach ($item->navigasi as $submenu)
                                                <li><a href="{{ $submenu->link }}">{{ $submenu->title }}
                                                        @if ($submenu->title === 'Keranjang')
                                                            <span style="background-color: red"
                                                                class="badge rounded-pill jumlah-keranjang"></span>
                                                        @endif
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $item->link }}" class="   @if ($routeName==$item->link) active @endif">{{ $item->title }}</a></li>
                                @endif
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
