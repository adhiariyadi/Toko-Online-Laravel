@extends('template_frontend.home')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>CATEGORY PAGE</h4>
            <div class="site-pagination">
                <a href="{{ route('home') }}">Home</a> /
                <a href="#">{{ $judul->name }}</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Brand</h2>
						<ul class="category-menu">
                            @foreach ($merek as $data)
                                <li><a href="{{ route('category', $data->id) }}">{{ $data->name }}<span>({{ $data->jumlah($data->id) }})</span></a></li>
                            @endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
                        @if ($mobil->count() > 0)
                            @foreach ($mobil as $data)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            @if ($data->id == $new->id)
                                                <div class="tag-new">New</div>
                                            @else
                                            @endif
                                            <img src="{{ asset( $data->gambar ) }}" alt="">
                                            <div class="pi-links">
                                                <a href="{{ url('add-to-cart/'.$data->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO
                                                        CART</span></a>
                                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="pi-text">
                                            <h6>$ {{ number_format($data->price, 0) }}</h6>
                                            <p>{{ $data->merek->name }} {{$data->type}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $mobil->links() }}
                        @else
                            <div class="col-12 text-center">
                                <h2>Tidak ada Mobil</h2>
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection
