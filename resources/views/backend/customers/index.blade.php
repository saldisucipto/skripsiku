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
                    @if (Session::has('pesan_sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <i class="fa fa-check-circle"></i> {!! session('pesan_sukses') !!}
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Customers</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered data">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Is Acitve ?</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $item)
                                            <tr>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->active == 1)
                                                        <span class="label label-primary">Active</span>
                                                    @else
                                                        <span class="label label-warning">Not Active</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->active == 1)
                                                        <a href="/home/deactive/{{ $item->id_customers }}"
                                                            class="btn btn-sm btn-danger">Deactive</a>
                                                    @else
                                                        {{-- <span class="label label-warning">Not Active</span> --}}
                                                        <a href="/home/activecust/{{ $item->id_customers }}"
                                                            class="btn btn-sm btn-primary">Activated User</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    </div>
    </div>
@endsection
