@extends('layouts.frontend.master')

@section('content')
    {{-- Startd Header --}}
    @include('layouts.frontend.header')
    {{-- End Header --}}
    {{-- {{ Session::get('nama_lengkap') }} --}}
    {{-- {{ Auth::guard('customers')->nama_lengkap }} --}}

    {{-- Strat Slider --}}
    @include('layouts.frontend.slider')
    {{-- End Slider --}}
    {{-- Produk Section --}}
    @include('layouts.frontend.produk')
    {{-- End Produk Section --}}

    {{-- Footer Start --}}
    @include('layouts.frontend.footer')
    {{-- End Footer --}}

@endsection
