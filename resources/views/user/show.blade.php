@extends('template_frontend.home')
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="{{ route('home') }}"> &lt;&lt; Back to Home</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="{{ asset( $mobil->gambar ) }}" alt="">
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">{{ $mobil->type }}</h2>
					<h3 class="p-price">$ {{ number_format($mobil->price, 0) }}</h3>
          <h2 class="p-title">Brand : <span>{{ $mobil->merek->name }}</span></h2>
          <h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<div class="p-review">
						<a href="">3587 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="quantity">
						<p>Quantity</p>
						<div class="pro-qty"><input type="text" value="1"></div>
					</div>
					<a href="{{ url('add-to-cart/'.$mobil->id) }}" class="site-btn">SHOP NOW</a>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->
@endsection
