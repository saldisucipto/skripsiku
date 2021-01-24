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
                        <div class="col-sm-6">
                            <div class="panel panel-headline">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Parent Navigasi</h3>
                                    <p class="panel-subtitle">Parent Navigasi Controller</p>
                                    <br>
                                    <a href="#" class="btn btn-sm btn-primary">Create New Parent Navigasi</a>
                                </div>
                                <div class="panel-body">
                                    <table id="dataNavigasi" class="table table-striped table-bordered data">
                                        <thead>
                                            <tr>
                                                <th>Tile Navigasi</th>
                                                <th>Link</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>data</td>
                                                <td>data</td>
                                                <td class="text-center"><a href="#" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#modalEdit"><i
                                                            class="fa fa-eye"></i>
                                                        Edit</a>|<a href="#" onclick="deleteSlider()"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                        Delete</a></td>
                                            </tr>
                                </div>
                            </div>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Navigasi</h3>
                            <p class="panel-subtitle">Panel Navigasi Controller</p>
                            <br>
                            <a href="#" class="btn btn-sm btn-primary">Create New Navigasi</a>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered data">
                                    <thead>
                                        <tr>
                                            <th>Tile</th>
                                            <th>Link</th>
                                            <th>Parent Nav</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>data</td>
                                            <td>data</td>
                                            <td>data</td>
                                            <td class="text-center"><a href="#" class="btn btn-sm btn-warning"
                                                    data-toggle="modal" data-target="#modalEdit"><i class="fa fa-eye"></i>
                                                    Edit</a>|<a href="#" onclick="deleteSlider()"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                    Delete</a></td>
                                        </tr>
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
    {{--
    <!-- Modal -->
    <div class="modal fade" id="modalCreateNew" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle"><strong>CREATE NEW SLIDER BANNER</strong></h5>
                </div>
                <div class="modal-body">
                    <form action="/slider-banner" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Title Slider</label>
                            <div class="col-sm-8">
                                <input type="text" name="title_slider" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Link Slider</label>
                            <div class="col-sm-8">
                                <input type="text" name="link_slider" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Decription Slider</label>
                            <div class="col-sm-8">
                                <textarea name="description_slider" class="form-control" cols="30" rows="5"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Images Slider</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images_slider" required id="images_slider">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create New</button>
                </div>
                </form>

            </div>--}}
        @endsection
