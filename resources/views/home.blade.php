@extends('template_frontend.home')
@section('content')
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2 class="title">Recent posts</h2>
        </div>
        <div class="col-lg-6 col-sm-6 col-6 main-section">
          <div class="dropdown">
            @if (Auth::user())
              <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
              </button>
            @endif
            <div class="dropdown-menu">
              <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </div>
                @foreach((array) session('cart') as $id => $details)
                @endforeach
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                  <p>Total: <span class="text-info">$ </span></p>
                </div>
              </div>

              @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                  <div class="row cart-detail">
                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                      <img width="80" src="{{ $details['photo'] }}" />
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                      <p style="text-transform: uppercase;">{{ $details['name'] }}</p>
                      <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                    </div>
                  </div>
                @endforeach
              @endif
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                  <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                </div>
              </div>
            </div>
          </div>
        </div><br><br>
      </div>
      <!-- post -->
      @php
        $i = 1;
      @endphp
      @foreach ($blog as $val)
      <div class="col-md-6">
        <div class="post">
          <a class="post-img" href="{{ route('blog.tampil_data', $val->id) }}"><img src="{{ asset( $val->gambar ) }}"></a>
          <div class="post-body">
            <div class="post-category">
              <a href="{{ route('blog.tampil_data', $val->id) }}">{{$val->category->name}}</a>
            </div>
            <h3 class="post-title"><a href="{{ route('blog.tampil_data', $val->id) }}">{!!$val->content!!}</a></h3>
            <ul class="post-meta">
              <li><a href="{{ route('blog.tampil_data', $val->id) }}">{{$val->title}}</a></li>
              <li>{{$val->created_at}}</li>
            </ul>
          </div>
          <p class="btn-holder"><a href="{{ url('add-to-cart/'.$val->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
        </div>
      </div>
      @if ($i % 2 == 0)
        <div class="clearfix visible-md visible-lg"></div>
      @endif
      @php
        $i++;
      @endphp
      @endforeach
      <!-- /post -->
    </div>
    {{ $blog->links() }}
  </div>
  <div class="col-md-4">
    <!-- social widget -->
    <div class="aside-widget">
      <div class="section-title">
        <h2 class="title">Social Media</h2>
      </div>
      <div class="social-widget">
        <ul>
          <li>
            <a href="https://www.facebook.com/profile.php?id=100007787444809" class="social-facebook">
              <i class="fa fa-facebook"></i>
              <span>21.2 K<br>Followers</span>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/didotz_poetra_ae/" class="social-instagram">
              <i class="fa fa-instagram"></i>
              <span>45.2 K<br>Followers</span>
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/channel/UCSU_al9Rti8l4AQtgb4dZlg?view_as=subscriber" class="social-youtube">
              <i class="fa fa-youtube"></i>
              <span>10.3 M<br>Subscribe</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /social widget -->

    <!-- category widget -->
    <div class="aside-widget">
      <div class="section-title">
        <h2 class="title">Categories</h2>
      </div>
      <div class="category-widget">
        <ul>
          <li><a href="">Lifestyle <span>451</span></a></li>
          <li><a href="">Fashion <span>230</span></a></li>
          <li><a href="">Technology <span>40</span></a></li>
          <li><a href="">Travel <span>38</span></a></li>
          <li><a href="">Health <span>24</span></a></li>
        </ul>
      </div>
    </div>
    <!-- /category widget -->
  </div>
  <!-- /row -->
@endsection
