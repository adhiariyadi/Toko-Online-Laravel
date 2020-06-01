@extends('template_backend.home')
@section('halaman', 'Show Order Mobil')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif
    
    <div class="contact-clients-area mg-b-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-client-single shadow-reset mg-t-30 contact-client-v2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-img-v2">
                                    <img src="{{ asset($order->mobil->gambar) }}" alt="" />
                                    <h2><a class="contact-client-name">{{ $order->namaMobil($order->mobil_id) }}</a></h2>
                                </div><br>
                                <div class="contact-client-address">
                                    <h3>Quantity: {{ $order->quantity }}</h3>
                                    <h3>Total: $ {{ number_format( $order->total , 0) }}</h3><br>
                                    <p class="address-client-ct client-addres-v2">Alamat: {{ $user->address }}, {{ $user->kelurahan }}, {{ $user->kecamatan }}, {{ $user->kabupaten }}, {{ $user->provinsi }}</p>
                                    <p>No. Telp: {{ $user->telepon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-client-single shadow-reset mg-t-30 contact-client-v2">
                        <div class="row">
                            <div class="col-lg-12">
                                @if ($order->bukti($order->id) == true)
                                    <div class="contact-img-v2">
                                        <img src="{{ asset($order->bukti($order->id)->foto) }}" alt="" />
                                    </div><hr><br>
                                    <div class="contact-client-address">
                                        <h3>Nama Pengirim: {{ $order->bukti($order->id)->nama_pengirim }}</h3><br>
                                        <h3>Nama Bank: {{ $order->bukti($order->id)->nama_bank }}</h3><br>
                                        @if ($order->payment_status !== 'Sudah Dibayar')
                                            <form action="{{ route('order.update', $order->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="btn btn-success btn-block" name="button">Konfirmasi</button>
                                            </form>
                                        @else
                                        @endif
                                    </div>
                                @else
                                    <div class="contact-client-address">
                                        <h3>Belum Melakukan Pembayaran</h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
