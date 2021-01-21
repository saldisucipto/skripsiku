@extends('layouts.backend.master')

@section('content')
    <div id="wrapper">
        {{-- Start Header --}}
        @include('layouts.backend.header')
        {{-- End Header --}}
        <!-- LEFT SIDEBAR -->
        @include('layouts.backend.sidebar')
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Company Infromation</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">General Info PT.CIPTA ANEKA SERVIS</h3>
                                            <p class="panel-subtitle">Konfigurasi Informasi Dasar</p>
                                        </div>
                                        <div class="panel-body">
                                            <form action="/edit-info/{{ $companyInfo->id }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="nama_perusahaan"
                                                            value="{{ $companyInfo->nama_perushaan }}" class="form-control"
                                                            style="text-transform:uppercase; font-weight:bold;" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nomor Telepon</label>
                                                    <div class="col-sm-6">
                                                        <input type="tel" name="nomor_telepon"
                                                            value="{{ $companyInfo->nomor_telepon }}" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-6">
                                                        <input type="email" name="email" value="{{ $companyInfo->email }}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Alamat Perusahaan</label>
                                                    <div class="col-sm-6">
                                                        <textarea name="alamat_perusahaan" class="form-control" cols="30"
                                                            rows="5">{{ $companyInfo->alamat_perusahaan }}</textarea>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-headline">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Logo Company</h3>
                                            <p class="panel-subtitle">Configure Your Logo</p>
                                        </div>
                                        <div class="panel-body">
                                            <h4>Logo 1</h4>
                                            <img style="max-height: 80px" class="img-fluid"
                                                src="/company-info/image/{{ $companyInfo->logo1 }}" alt="">
                                            <input type="file" name="logo1">
                                        </div>
                                        <div class="panel-body">
                                            <img style="max-width: 110px"
                                                src="/company-info/image/{{ $companyInfo->logo2 }}" alt="">
                                            <h4>Logo 2</h4>
                                            <input type="file" name="logo2">
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-block btn-info" type="submit"><strong>Perbaharui
                                            Informasi</strong></button>

                                </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->

        {{-- start footer --}}
        @include('layouts.backend.footer')
        {{-- End Footer --}}
    </div>
@endsection
