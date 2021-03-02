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
    </div>
    {{-- End Notifikasi --}}
    {{-- Section --}}
    <section id="form" style="margin: 20px auto;">
        <!--form-->
        <div class="container pt-2 pb-2">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-conter" style=" margin:0 auto;">LIST YOUR INVOICE</h3>
                    <hr>
                    <div class="bs-example" data-example-id="striped-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice Number</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Amount</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @php
                                function rupiah($amount)
                                {
                                    $amountrupiah = 'Rp ' . number_format($amount, 0, ',', '.');
                                    return $amountrupiah;
                                }
                            @endphp
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->id_invoice }} | <span class="label label-primary"><a
                                                    style="text-decoration: none; color:white"
                                                    href="/invoice/{{ $item->id_invoice }}">Clik
                                                    Here, For
                                                    Detail</a></span></td>
                                        <td>{{ $item->pembayaran->nama_metode }} |
                                            {{ $item->pembayaran->account_number }}
                                        </td>
                                        <td>{{ rupiah($item->jumlah_pembayaran) }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            @if ($item->terverifikasi == 0)
                                                <span class="label label-warning">Proses Verifikasi</span>
                                            @else
                                                <span class="label label-primary">Pembayaran Terverifikasi</span> <span
                                                    class="label label-info"> <a href="#">Cek Pengiriman</a> </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- End Section --}}

    {{-- Footer Start --}}
    @include('layouts.frontend.footer')
    {{-- End Footer --}}

@endsection
