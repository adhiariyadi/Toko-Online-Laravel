@extends('template_frontend.home')
@section('content')
  	<!-- Product filter section -->
  	<section class="product-filter-section mt-5">
  		<div class="container">
  			<div class="section-title">
  				<h2>FAVORITE PRODUCTS</h2>
  			</div>
  			<div class="row">
          		@foreach ($like as $data)
    				<div class="col-lg-3 col-sm-6">
    					<div class="product-item">
    						<div class="pi-pic">
                                @if ($data->mobil->id == $new->id)
                                    <div class="tag-new">New</div>
                                @else
                                @endif
                  				<a href="{{ route('mobil.show', $data->mobil->id) }}"><img src="{{ asset( $data->mobil->gambar ) }}" alt=""></a>
    							<div class="pi-links">
									<a href="{{ url('add-to-cart/'.$data->mobil->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
									@if ($data->mobil->like($data->mobil->id))
										<a href="{{ url('unlike/'.$data->mobil->id) }}" class="wishlist-btn"><i class="fa fa-heart"></i></a>
									@else
										<a href="{{ url('like/'.$data->mobil->id) }}" class="wishlist-btn"><i class="fa fa-heart-o"></i></a>
									@endif
    							</div>
    						</div>
    						<div class="pi-text">
                  				<h6><a href="{{ route('mobil.show', $data->mobil->id) }}">$ {{ number_format($data->mobil->price, 0) }}</a></h6>
      							<p><a href="{{ route('mobil.show', $data->mobil->id) }}">{{ $data->mobil->merek->name }} {{$data->mobil->type}}</a></p>
    						</div>
    					</div>
    				</div>
          		@endforeach
  			</div>
  		</div>
  	</section>
  	<!-- Product filter section end -->
@endsection
