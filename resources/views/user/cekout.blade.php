@extends('template_frontend.home')
@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Cekout</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Home</a> /
				<a href="{{ route('cekout') }}">Cekout</a>
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
								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
								@if(Auth::user()->name)
									<input type="text" name="name" value="{{ Auth::user()->name }}" readonly>
								@else
									<input type="text" name="name" placeholder="Nama">
								@endif
								@if(Auth::user()->address)
									<input type="text" name="address" value="{{ Auth::user()->address }}" readonly>
								@else
									<input type="text" name="address" placeholder="Alamat">
								@endif
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kelurahan)
									<input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan }}" readonly>
								@else
									<input type="text" name="kelurahan" placeholder="Kelurahan">
								@endif
								@if(Auth::user()->kabupaten)
									<input type="text" name="kabupaten" value="{{ Auth::user()->kabupaten }}" readonly>
								@else
									<input type="text" name="kabupaten" placeholder="Kabupaten">
								@endif
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kecamatan)
									<input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan }}" readonly>
								@else
									<input type="text" name="kecamatan" placeholder="Kecamatan">
								@endif
								@if(Auth::user()->provinsi)
									<input type="text" name="provinsi" value="{{ Auth::user()->provinsi }}" readonly>
								@else
									<input type="text" name="provinsi" placeholder="Provinsi">
								@endif
							</div>
							<div class="col-md-12">
								@if(Auth::user()->email)
									<input type="text" name="email" value="{{ Auth::user()->email }}" readonly>
								@else
									<input type="text" name="email" placeholder="Email">
								@endif
							</div>
							<div class="col-md-6">
								@if(Auth::user()->kode_pos)
									<input type="text" name="kode_pos" value="{{ Auth::user()->kode_pos }}" readonly>
								@else
								<input type="text" name="kode_pos" placeholder="Kode Pos">
								@endif
							</div>
							<div class="col-md-6">
								@if(Auth::user()->telepon)
									<input type="text" name="telepon" value="{{ Auth::user()->telepon }}" readonly>
								@else
								<input type="text" name="telepon" placeholder="Nomor Telepon">
								@endif
							</div>
						</div>
						<div class="cf-title">Payment</div>
						<div class="container row address-inputs">
							<div class="col-md-12">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" value="COD" id="payment-1">
										<label for="payment-1">COD</label>
									</div>
								</div>
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" value="Paypal" id="payment-2">
										<label for="payment-2">Paypal</label>
									</div>
								</div>
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" value="Credit / Debit card" id="payment-3">
										<label for="payment-3">Credit / Debit card</label>
									</div>
								</div>
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
									<p>$ {{ number_format( $details['price'] * $details['quantity'] , 0) }}</p>
	                @php
	                  $total += $details['price'] * $details['quantity'];
	                @endphp
								</li>
              @endforeach
						</ul>
						<ul class="price-list">
							<li>Total<span style="width: 120px;">$ {{ number_format($total, 0) }}</span></li>
							<li>Shipping<span style="width: 120px;">free</span></li>
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
