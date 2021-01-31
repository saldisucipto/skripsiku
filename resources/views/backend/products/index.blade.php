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
                                <h3 class="panel-tile">Products Controller</h3>
                                <p class="panel-subtitle">Konfigurasi Products</p>
                                <p> <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#myLargeModal"> <i class="fa fa-plus"></i> Create New
                                        Product</a></p>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    @foreach ($produk as $item)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img style="max-height: 500px" class="img-responsive"
                                                    src="/produk/images/{{ $item->foto_produk }}" alt="">
                                                <div class="caption">
                                                    <h3 style="font-size: 20px" class="text-center">
                                                        {{ str_limit($item->nama_produk, $limit = 20, $end = '.') }}
                                                    </h3>
                                                    <p class="text-center"><b> Under Category :
                                                        </b>{{ str_limit($item->kategori->nama_kategori, $limit = 20, $end = '.') }}
                                                    </p>
                                                    <p class="text-center"><a href="#" class="btn btn-warning btn-sm"
                                                            role="button">Update</a> <a href="#"
                                                            class="btn btn-danger btn-sm" role="button">Delete</a></p>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- END MAIN -->
    {{-- start footer --}}
    @include('layouts.backend.footer')
    {{-- End Footer --}}
    </div>
    {{-- Modal --}}
    {{-- modal --}}
    <div class="modal fade" id="myLargeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Create New Produk</h4>
                </div>
                <div class="modal-body" style="max-height: 482.4px; overflow-y: auto;">
                    <form action="/product-create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Produk</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Under Kategori</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_kategori">
                                    <option disabled selected aria-readonly="true"><i class="fa fa-trash"></i>Pilih Kategori
                                        Produk</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi_produk" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga Produk</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Harga produk" name="harga_produk" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Part Number Produk</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Part Number Produk" name="part_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Stok Produk</label>
                            <div class="col-sm-2">
                                <input type="number" placeholder="Stok" min="0" name="stok_barang" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Foto Produk</label>
                            <div class="col-sm-8">
                                <input type="file" name="foto_produk">
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
