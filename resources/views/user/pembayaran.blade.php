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
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post" action="{{ route('proses_pembayaran', $order->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
						<div class="cf-title">Billing Address</div>
						<div class="row address-inputs justify-content-center">
							<div class="col-md-11">
                <div class="form-group">
                  <label>Nama Bank</label>
                  <input type="text" name="nama_bank" placeholder="Nama Bank" autocomplete="off">
                @error('nama_bank')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
                </div>
                <div class="form-group">
                  <label>Nama Pengirim</label>
                  <input type="text" name="nama_pengirim" placeholder="Nama Pengirim" autocomplete="off">
                @error('nama_pengirim')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
                </div>
                <div class="form-group">
                  <label>Bukti Transfer Pembayaran</label><br>
                  <input type="file" name="gambar">
                </div>
							</div>
						</div>
						<button class="site-btn submit-order-btn">Continue</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart mb-5">
            <ul class="price-list">
              <li>Sub Total<span style="width: 120px;">$ {{ number_format($order->total, 0) }}</span></li>
              <li>PPN<span style="width: 120px;">10%</span></li>
              @php
                $order->total += ($order->total * 10 / 100)
              @endphp
              <li class="total">Total<span style="width: 120px;">$ {{ number_format($order->total, 0) }}</span></li>
            </ul>
					</div>
					<div class="checkout-cart">
            <h3>Payment</h3>
            <ul class="product-list">
              <li>
                <div class="pl-thumb mt-3"><img src="{{ asset('img/logo bca.png') }}" alt=""></div>
                <h6 style="margin-top: -15px;">Bank Central Asia</h6>
                <span>0021 3234<br>Adhi Ariyadi</span>
              </li>
              <li>
                <div class="pl-thumb"><img src="{{ asset('img/logo mandiri.png') }}" alt=""></div>
                <h6 style="margin-top: -15px;">Bank Mandiri</h6>
                <span>0021 3234<br>Adhi Ariyadi</span>
              </li>
            </ul>
					</div>
				</div>
      </div>
		</div>
	</section>
	<!-- checkout section end -->
@endsection
