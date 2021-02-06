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
                            <h3 class="panel-title">Navigasi</h3>
                            <p class="panel-subtitle">Panel Navigasi Controller</p>
                            <br>
                            <a href="#" data-target="#createNav" data-toggle="modal" class="btn btn-sm btn-primary">Create
                                New Navigasi</a>
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
                                                <td>{{ $item->active }}</td>
                                                <td class="text-center"><a href="#" class="btn btn-xs btn-warning"
                                                        data-toggle="modal" data-target="#modalEditNav"><i
                                                            class="fa fa-eye"></i>
                                                        Edit</a>|<a href="#" onclick="deleteNav({{ $item->id }})"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                        Delete</a></td>
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
