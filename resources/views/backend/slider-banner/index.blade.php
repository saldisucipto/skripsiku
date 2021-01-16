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
                            <!DOCTYPE html>
                            <html>

                            <head>
                                <title>Cara Menggunakan Datatables | Malas Ngoding</title>
                                <script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
                                <script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js">
                                </script>
                                <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
                                <link rel="stylesheet" type="text/css"
                                    href="assets/DataTables/media/css/jquery.dataTables.css">
                                <link rel="stylesheet" type="text/css"
                                    href="assets/DataTables/media/css/dataTables.bootstrap.css">
                            </head>

                            <body>
                                <center>
                                    <h1>Menampilkan data dengan datatables | Malas Ngoding</h1>
                                </center>
                                <br />
                                <br />
                                <div class="container">
                                    <table class="table table-striped table-bordered data">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Pekerjaan</th>
                                                <th>Usia</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Malas Ngoding</td>
                                                <td>Bandung</td>
                                                <td>Web Developer</td>
                                                <td>26</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Malas Ngoding</td>
                                                <td>Bandung</td>
                                                <td>Web Developer</td>
                                                <td>26</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                            <tr>
                                                <td>Andi</td>
                                                <td>Jakarta</td>
                                                <td>Web Designer</td>
                                                <td>21</td>
                                                <td>Aktif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </body>

                            </html>
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
