@extends('template_frontend.home')
@section('content')
	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category PAge</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Home</a> /
				<a href="#">Shop</a>
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
						<div class="pro-qty"><input class="newQuantity" type="text" value="1"></div>
					</div>
					<a href="{{ url('add-to-cart/'.$mobil->id) }}" class="site-btn">SHOP NOW</a>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->
	
	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach ($produk as $data)
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{ asset( $data->gambar ) }}" alt="">
							<div class="pi-links">
								<a href="{{ url('add-to-cart/'.$data->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$ {{ number_format($data->price, 0) }}</h6>
							<p>{{ $data->merek->name }} {{$data->type}}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->
@endsection
