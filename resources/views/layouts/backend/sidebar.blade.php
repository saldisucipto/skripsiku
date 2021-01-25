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
                {{-- <li><a href="#product" class=" @if ($routeName==='product' ) active @endif"><i
                            class="lnr lnr-store"></i> <span> Product </span></a>
                </li> --}}
                <li>
                    <a href="#product" data-toggle="collapse" class="@if ($routeName==='product'
                        || $routeName==='category-product' ) active @endif"
                        aria-expanded="true"><i class="lnr lnr-store"></i> <span>Product</span> <i
                            class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="product" class="collapse in" aria-expanded="true" style="">
                        <ul class="nav">
                            <li><a href="/category-product" class="">Category Product</a></li>
                            <li><a href="/product" class="">Product</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
