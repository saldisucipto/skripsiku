@extends('layouts.frontend.master')

@section('content')
    {{-- Startd Header --}}
    @include('layouts.frontend.header')
    {{-- End Header --}}
    {{-- Notifikasi --}}
    <div class="container" style="margin: 0 auto">
        @if (Session::has('sukses'))
            <div style="background-color: #1654A3; color:white;" class="alert alert-primary alert-dismissible" role="alert">
                <button style="color: white" type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="alert-heading">Sukses</h4>
                <hr>
                <p>{!! session('sukses') !!}</p>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button style="color: white" type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="alert-heading">Errors</h4>
                <hr>
                <p>{!! session('error') !!}</p>
            </div>
        @endif
    </div>
    {{-- End Notifikasi --}}
    {{-- Section --}}
    <section id="form" style="margin: 20px auto;">
        <!--form-->
        <div class="container pt-2 pb-2">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <img class="img-fluid" src="/company-info/image/{{ $companyInfo->logo2 }}" alt="">
                        {{-- <p>
                        <h2>PT. Cipta Aneka Air</h2>
                        </p> --}}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{ route('admin.login.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="text" placeholder="Name"> --}}
                            <input type="email" name="email" placeholder="Email Address">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password" placeholder="Your Password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <span>
                                <input type="checkbox" name="remember" class="checkbox">
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    {{-- End Section --}}

    {{-- Footer Start --}}
    @include('layouts.frontend.footer')
    {{-- End Footer --}}

@endsection
