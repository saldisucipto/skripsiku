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
                                    <a href="#" data-toggle="modal" data-target="#createParentNav" class="btn btn-sm btn-primary">Create New Parent Navigasi</a>
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
                                            @foreach ($parentNav as $item)
                                            <tr>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->link}}</td>
                                                <td class="text-center"><a href="#" class="btn btn-xs btn-warning"
                                                        data-toggle="modal" data-target="#editParentNav"><i
                                                            class="fa fa-eye"></i>
                                                        Edit</a>|<a href="#" onclick="deleteSlider()"
                                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                        Delete</a></td>
                                            </tr>
                                            <div class="modal fade" id="editParentNav" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editParentNav"><strong>Create Parent Navigasi</strong></h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/navigasi-parent" method="POST" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Nama Navigasi</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="title" value="{{$item->title}}" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Link Navigasi</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="link" value="{{$item->link}}"  class="form-control" required>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Create New</button>
                                                        </div>
                                                        </form>
                                        
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            @endforeach
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
                            <a href="#" data-target="#createNav" data-toggle="modal" class="btn btn-sm btn-primary">Create New Navigasi</a>
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
                                      @foreach ($nav as $item)
                                      <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->link}}</td>
                                        <td>{{$item->parent->title}}</td>
                                        <td class="text-center"><a href="#" class="btn btn-xs btn-warning"
                                                data-toggle="modal" data-target="#modalEdit"><i class="fa fa-eye"></i>
                                                Edit</a>|<a href="#" onclick="deleteSlider()"
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
    <!-- END MAIN -->
    {{-- start footer --}}
    {{-- @include('layouts.backend.footer') --}}
    {{-- End Footer --}}
    </div>
    
    <!-- Modal Create Parent Nav-->
    <div class="modal fade" id="createParentNav" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle"><strong>Create Parent Navigasi</strong></h5>
                </div>
                <div class="modal-body">
                    <form action="/navigasi-parent" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Parent Navigasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create New</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    {{-- Modal create Navigasi --}}
    <div class="modal fade" id="createNav" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createModalTitle"><strong>Create Navigasi</strong></h4>
                </div>
                <div class="modal-body">
                    <form action="/navigasi" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Navigasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Under Parent Navigasi</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="id_parent">
                                    <option disabled selected aria-readonly="true"><i class="fa fa-trash"></i>Pilih Parent Navigasi</option>
                                    @foreach ($parentNav as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create New</button>
                </div>
                </form>

            </div>
        </div>
    </div>

@endsection
