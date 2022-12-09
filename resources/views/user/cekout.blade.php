@extends('template_frontend.home')
@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Cekout</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Home</a> /
				<a href="#">Cekout</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post" action="{{ route('proses_cekout', Auth::user()->id) }}">
						@csrf
						<div class="cf-title">Billing Address</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								@if(Auth::user()->name)
									<input type="text" name="name" value="{{ Auth::user()->name }}">
								@else
									<input type="text" name="name" placeholder="Nama">
								@endif
								@error('name')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								@if(Auth::user()->address)
									<input type="text" name="address" value="{{ Auth::user()->address }}">
								@else
									<input type="text" name="address" placeholder="Alamat">
								@endif
								@error('address')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kelurahan)
									<input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan }}">
								@else
									<input type="text" name="kelurahan" placeholder="Kelurahan">
								@endif
								@error('kelurahan')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								@if(Auth::user()->kabupaten)
									<input type="text" name="kabupaten" value="{{ Auth::user()->kabupaten }}">
								@else
									<input type="text" name="kabupaten" placeholder="Kabupaten">
								@endif
								@error('kabupaten')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kecamatan)
									<input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan }}">
								@else
									<input type="text" name="kecamatan" placeholder="Kecamatan">
								@endif
								@error('kecamatan')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
								@if(Auth::user()->provinsi)
									<input type="text" name="provinsi" value="{{ Auth::user()->provinsi }}">
								@else
									<input type="text" name="provinsi" placeholder="Provinsi">
								@endif
								@error('provinsi')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-12">
								@if(Auth::user()->email)
									<input type="text" name="email" value="{{ Auth::user()->email }}">
								@else
									<input type="text" name="email" placeholder="Email">
								@endif
								@error('email')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kode_pos)
									<input type="text" name="kode_pos" value="{{ Auth::user()->kode_pos }}">
								@else
								<input type="text" name="kode_pos" placeholder="Kode Pos">
								@endif
								@error('kode_pos')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col-md-6">
								@if(Auth::user()->telepon)
									<input type="text" name="telepon" value="{{ Auth::user()->telepon }}">
								@else
								<input type="text" name="telepon" placeholder="Nomor Telepon">
								@endif
								@error('telepon')
								 	<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<button class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					@php
						$total = 0;
					@endphp
					@if(session('cart'))
						<div class="checkout-cart">
							<h3>Your Cart</h3>
							<ul class="product-list">
							@foreach(session('cart') as $id => $details)
								<li>
									<div class="pl-thumb"><img src="{{ $details['photo'] }}" alt=""></div>
									<h6 style="margin-top: -13px;">{{ $details['name'] }}</h6>
									<span>Quantity: {{ $details['quantity'] }}</span>
								</li>
							@endforeach
							</ul>
							<ul class="price-list">
								@php
								$total += $details['price'] * $details['quantity'];
								@endphp
								<li>Sub Total<span style="width: 120px;">$ {{ number_format($total, 0) }}</span></li>
								<li>PPN<span style="width: 120px;">10%</span></li>
								@php
									$total += ($total * 10 / 100)
								@endphp
								<li class="total">Total<span style="width: 120px;">$ {{ number_format($total, 0) }}</span></li>
							</ul>
						</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

@endsection
