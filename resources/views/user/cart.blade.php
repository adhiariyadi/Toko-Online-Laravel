@extends('template_frontend.home')
@section('content')
  <!-- Page info -->
  <div class="page-top-info">
    <div class="container">
      <h4>Cart</h4>
      <div class="site-pagination">
        <a href="{{ route('home') }}">Home</a> /
        <a href="#">Cart</a>
      </div>
    </div>
  </div>
  <!-- Page info end -->


  <!-- cart section end -->
  <section class="cart-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @php
           $total = 0;
          @endphp
          @if(session('cart'))
          <div class="cart-table">
            <h3>Your Cart</h3>
            <div class="cart-table-warp">
              <table>
                <thead>
                  <tr>
                    <th class="product-th">Product</th>
                    <th class="quy-th">Quantity</th>
                    <th class="size-th">Brand</th>
                    <th class="total-th">Price</th>
                    <th class="total-th">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(session('cart') as $id => $details)
                  <tr>
                    <td class="product-col">
                      <img src="{{ $details['photo'] }}" alt="">
                      <div class="pc-title">
                        <h4>{{ $details['name'] }}</h4>
                        <p>$ {{ number_format($details['price'], 0) }}</p>
                      </div>
                    </td>
                    <td data-th="Quantity" class="quy-col">
                      <div class="quantity">
                        <div class="pro-qty">
                          <input type="text" class="new-quantity" value="{{ $details['quantity'] }}">
                        </div>
                      </div>
                    </td>
                    <td data-th="Brand" class="size-col">
                      <h4>{{ $details['brand'] }}</h4>
                    </td>
                    <td data-th="Price" class="total-col">
                      <h4>$ {{ number_format( $details['price'] * $details['quantity'] , 0) }}</h4>
                      @php
                        $total += $details['price'] * $details['quantity'];
                      @endphp
                    </td>
                    @csrf
                    <td class="actions text-center" data-th="">
                      <button class="btn btn-info btn-sm update_cart-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                      <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="total-cost">
              <h6>Total <span>$ {{ number_format($total, 0) }}</span></h6>
            </div>
          </div>
          @endif
        </div>
        <div class="col-lg-4 card-right">
          @if(session('cart'))
          <a href="{{ route('cekout') }}" class="site-btn">Proceed to checkout</a>
          @endif
          <a href="{{ route('home') }}" class="site-btn sb-dark">Continue shopping</a>
        </div>
      </div>
    </div>
  </section>
  
	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
      </div>
      <?php $no=0; ?>
			<div class="row">
        @foreach ($produk as $data)
          <div class="col-lg-3 col-sm-6">
            <div class="product-item">
              <div class="pi-pic">
                @if ($no == 0)
                  <div class="tag-new">New</div>
                @else
                @endif
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
          </div>
          <?php $no++ ?>
        @endforeach
			</div>
		</div>
	</section>
	<!-- Related product section end -->
@endsection
