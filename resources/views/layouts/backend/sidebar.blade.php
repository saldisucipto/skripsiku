<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/home" class=" @if ($routeName==='home' ) active @endif"><i class="lnr lnr-home"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="/company-info" class=" @if ($routeName==='company-info' ) active @endif"><i class="lnr lnr-apartment"></i> <span>Company
                            Info</span></a></li>
                <li><a href="/navigasi" class=" @if ($routeName==='navigasi' ) active @endif"><i class="lnr lnr-map"></i> <span>Navigasi
                            Website</span></a></li>
                </li>
                <li><a href="/slider-banner" class=" @if ($routeName==='slider-banner' ) active @endif"><i class="lnr lnr-picture"></i> <span>Slider
                            Banners</span></a></li>
                </li>
                {{-- <li><a href="#product" class=" @if ($routeName === 'product') active @endif"><i
                            class="lnr lnr-store"></i> <span> Product </span></a>
                </li> --}}
                <li><a href="/home-customers" class=" @if ($routeName==='home-customers' ) active @endif"><i class="lnr lnr-users"></i> <span>Users
                            Customers</span></a>
                <li><a href="/account-number" class=" @if ($routeName==='account-number' ) active @endif"><i class="lnr lnr-layers"></i> <span>Account
                            Pembayaran</span></a>

                <li>
                    <a href="#product" data-toggle="collapse" class="@if ($routeName==='product'
                        || $routeName==='category-product' ) active @endif"
                        aria-expanded="true"><i class="lnr lnr-store"></i> <span>
                            Product</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="product" class="collapse in" aria-expanded="true" style="">
                        <ul class="nav">
                            <li><a href="/category-product" class=" @if ($routeName==='category-product' ) active @endif"> <i
                                        class="fa fa-archive"></i> Category
                                    Product</a></li>
                            <li><a href="/product" class=" @if ($routeName==='product' ) active @endif"><i class="fa fa-product-hunt"></i>Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="/metode-pengiriman" class=" @if ($routeName==='metode-pengiriman'
                        ) active @endif"><i class="fa fa-car"></i>
                        <span>Metode Pengiriman</span></a></li>
                </li>
                <li><a href="/backend-orders" class=" @if ($routeName==='backend-orders' ) active @endif"><i class="lnr lnr-cart"></i> <span>Order</span></a>
                </li>
                <li><a href="/pembayaran" class=" @if ($routeName==='pembayaran' ) active @endif"><i class="fa fa-money"></i>
                        <span>Pembayaran</span></a></li>
                </li>

                <li><a href="/laporan" class=" @if ($routeName==='laporan' ) active @endif"><i class="lnr lnr-chart-bars"></i>
                        <span>Laporan</span></a>
                </li>
                </li>
                </li>
            </ul>
        </nav>
    </div>
</div>
