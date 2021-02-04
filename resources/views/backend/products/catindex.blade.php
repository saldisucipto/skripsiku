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
                    <div class="row">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-tile">Products Category Controller</h3>
                                <p class="panel-subtitle">Konfigurasi Products</p>
                                <p> <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#myLargeModal"> <i class="fa fa-plus"></i> Create New
                                        Category
                                        Product</a></p>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-headline">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    @foreach ($category as $item)
                                                        <div class="col-sm-6 col-md-4">
                                                            <div class="thumbnail">
                                                                <img style="max-height: 500px" class="img-responsive"
                                                                    src="/produk/images/{{ $item->foto_kategori }}"
                                                                    alt="">
                                                                <div class="caption">
                                                                    <h3 style="font-size: 20px" class="text-center">
                                                                        {{ str_limit($item->nama_kategori, $limit = 20, $end = '.') }}
                                                                    </h3>
                                                                    <p class="text-center"><a href="#"
                                                                            class="btn btn-warning btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#modalupdate{{ $item->id_kategori }}"
                                                                            role="button">Update</a> <a href="#"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="deleteKat({{ $item->id_kategori }})"
                                                                            role="button">Delete</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="modalupdate{{ $item->id_kategori }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                            aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content" style="overflow: hidden;">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">×</button>
                                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                                            Update Kategori Produk</h4>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        style="max-height: 482.4px; overflow-y: auto;">
                                                                        <form
                                                                            action="/category-update/{{ $item->id_kategori }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <img style="margin: 0 auto; padding-bottom: 20px;"
                                                                                class="img-responsive"
                                                                                src="/produk/images/{{ $item->foto_kategori }}"
                                                                                alt="">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label">Nama
                                                                                    Produk Kategori</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="nama_kategori"
                                                                                        value="{{ $item->nama_kategori }}"
                                                                                        class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="col-sm-4 col-form-label">Deskripsi
                                                                                    Kategori Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <textarea class="form-control"
                                                                                        name="deskripsi_kategori" cols="30"
                                                                                        rows="5">{{ $item->deskripsi_kategori }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label">Foto
                                                                                    Kategori</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="file" name="foto_kategori"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="#" data-dismiss="modal" type="button"
                                                                            class="btn btn-sm btn-danger"> Close </a>
                                                                        <button class="btn btn-sm btn-primary"
                                                                            type="submit"> <a
                                                                                class="btn btn-sm btn-primary"> Save </a>
                                                                        </button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        {{-- End Modal --}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- END MAIN -->
    {{-- start footer --}}
    {{-- @include('layouts.backend.footer') --}}
    {{-- End Footer --}}
    </div>
    {{-- modal --}}
    <div class="modal fade" id="myLargeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Create New Kategori Produk</h4>
                </div>
                <div class="modal-body" style="max-height: 482.4px; overflow-y: auto;">
                    <form action="/category-product" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Produk Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Deskripsi Kategori Produk</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi_kategori" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto Kategori</label>
                            <div class="col-sm-8">
                                <input type="file" name="foto_kategori" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal --}}
@endsection
