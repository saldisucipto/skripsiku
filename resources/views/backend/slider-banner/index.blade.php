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
                        <h3 class="panel-title">Slider Banner</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
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
