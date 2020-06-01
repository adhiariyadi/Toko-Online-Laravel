@extends('template_frontend.home')
@section('css')
	<link type="text/css" rel="stylesheet" href="http://localhost/blog/public/css/style.css" />
@endsection
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Pembayaran</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Home</a> /
				<a href="#">Pembayaran</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- checkout section  -->
	<section class="section spad">
		<div class="container">
        @foreach ($order as $data)
            <div id="hot-post" class="row hot-post">
                <div class="col-12 hot-post-left">
                    <div class="post post-row">
                        <a class="post-img"><img src="{{ asset($data->mobil->gambar) }}"></a>
                        <div class="post-body">
                            <h3 class="post-title">{{ $data->namaMobil($data->mobil_id) }}</h3>
                            <h3 class="post-title">Quantity: {{ $data->quantity }}</h3>
                            <h3 class="post-title">Total: $ {{ number_format( $data->total , 0) }}</h3>
                            <h3 class="post-title">Status: 
                                @if ($data->payment_status == 'Sudah Dibayar')
                                    <span class="badge badge-success">{{ $data->payment_status }}</span>
                                @elseif ($data->payment_status == 'Belum Dibayar')
                                    <span class="badge badge-danger">{{ $data->payment_status }}</span>
                                @else
                                    <span class="badge badge-warning text-white">{{ $data->payment_status }}</span>
                                @endif
                            </h3>
                            <ul class="post-meta">
                                <li>{{ $data->created_at->format('l, H:i:s d M Y') }}</li>
                            </ul>
                            @if ($data->payment_status == 'Belum Dibayar')
                                <form action="{{ route('order.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('pembayaran', $data->id) }}" class="btn btn-primary btn-sm mr-2" style="width: 100px;">Bayar</a>
                                    <button type="submit" class="btn btn-danger btn-sm" style="width: 100px;" name="button" onclick="return confirm('Yakin');">Cancel</button>
                                </form>
                            @elseif ($data->payment_status == 'Dipending')
                                <form action="{{ route('order.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" style="width: 100px;" name="button" onclick="return confirm('Yakin');">Cancel</button>
                                </form>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
		</div>
	</section>
	<!-- checkout section end -->
@endsection
