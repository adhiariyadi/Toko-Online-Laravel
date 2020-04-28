@extends('template_frontend.home')
@section('content')
  	<!-- Hero section -->
  	<section class="hero-section">
  		<div class="hero-slider owl-carousel">
        @foreach ($car as $val)
  			<div class="hs-item set-bg" data-setbg="{{ asset( $val->gambar) }}">
  				<div class="container">
  					<div class="row">
  						<div class="col-xl-6 col-lg-7 text-white">
  							<span>New Arrivals</span>
  							<h2>Sport Car</h2>
  							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
  							<a href="#" class="site-btn sb-line">DISCOVER</a>
  							<a href="{{ url('add-to-cart/'.$val->id) }}" class="site-btn sb-white">ADD TO CART</a>
  						</div>
  					</div>
  				</div>
  			</div>
        @endforeach
  		</div>
  		<div class="container">
  			<div class="slide-num-holder" id="snh-1"></div>
  		</div>
  	</section>
  	<!-- Hero section end -->

  	<!-- Features section -->
  	<section class="features-section">
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col-sm-4 p-0 feature">
  					<div class="feature-inner">
  						<div class="feature-icon">
  							<img src="user/img/icons/1.png" alt="#">
  						</div>
  						<h2>Fast Secure Payments</h2>
  					</div>
  				</div>
  				<div class="col-sm-4 p-0 feature">
  					<div class="feature-inner">
  						<div class="feature-icon">
  							<img src="user/img/icons/2.png" alt="#">
  						</div>
  						<h2>Premium Products</h2>
  					</div>
  				</div>
  				<div class="col-sm-4 p-0 feature">
  					<div class="feature-inner">
  						<div class="feature-icon">
  							<img src="user/img/icons/3.png" alt="#">
  						</div>
  						<h2>Free & fast Delivery</h2>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
  	<!-- Features section end -->

  	<!-- letest product section -->
  	<section class="top-letest-product-section">
  		<div class="container">
  			<div class="section-title">
  				<h2>LATEST PRODUCTS</h2>
  			</div>
  			<div class="product-slider owl-carousel">
          @foreach ($mobil as $val)
    				<div class="product-item">
    					<div class="pi-pic">
                <a href="{{ route('mobil.show', $val->id) }}"><img src="{{ asset( $val->gambar ) }}" alt=""></a>
    						<div class="pi-links">
    							<a href="{{ url('add-to-cart/'.$val->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
    							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
    						</div>
    					</div>
    					<div class="pi-text">
    						<h6><a href="{{ route('mobil.show', $val->id) }}">$ {{ number_format($val->price, 0) }}</a></h6>
    						<p><a href="{{ route('mobil.show', $val->id) }}">{{ $val->merek->name }} {{$val->type}}</a></p>
    					</div>
    				</div>
          @endforeach
  			</div>
  		</div>
  	</section>
  	<!-- letest product section end -->



  	<!-- Product filter section -->
  	<section class="product-filter-section">
  		<div class="container">
  			<div class="section-title">
  				<h2>BROWSE TOP SELLING PRODUCTS</h2>
  			</div>
  			<div class="row">
          @foreach ($mobil as $val)
    				<div class="col-lg-3 col-sm-6">
    					<div class="product-item">
    						<div class="pi-pic">
                  <a href="{{ route('mobil.show', $val->id) }}"><img src="{{ asset( $val->gambar ) }}" alt=""></a>
    							<div class="pi-links">
    								<a href="{{ url('add-to-cart/'.$val->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
    								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
    							</div>
    						</div>
    						<div class="pi-text">
                  <h6><a href="{{ route('mobil.show', $val->id) }}">$ {{ number_format($val->price, 0) }}</a></h6>
      						<p><a href="{{ route('mobil.show', $val->id) }}">{{ $val->merek->name }} {{$val->type}}</a></p>
    						</div>
    					</div>
    				</div>
          @endforeach
  			</div>
  		</div>
  	</section>
  	<!-- Product filter section end -->
@endsection
