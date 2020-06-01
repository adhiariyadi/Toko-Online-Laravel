<!-- Header section -->
<header class="header-section">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-5">
          <form class="header-search-form">
            <input type="text" placeholder="Search on shop ....">
            <button><i class="flaticon-search"></i></button>
          </form>
        </div>
        <div class="col-lg-2 text-center"></div>
        <div class="col-xl-4 col-lg-5">
          <div class="user-panel">
            <div class="up-item">
              @if (Auth::user())
                <div class="shopping-card">
                  <i class="flaticon-bag"></i>
                  <span>{{ count((array) session('cart')) }}</span>
                </div>
                <a href="{{ route('cart') }}">Shopping Cart</a>
              @endif
            </div>
            <div class="up-item ml-4">
              <i class="flaticon-profile"></i>
              <a href="{{ route('profil', Auth::user()->id) }}">Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="main-navbar">
    <div class="container">
      <!-- menu -->
      <ul class="main-menu">
        <li><a href="/">Home</a></li>
        <li><a href="#">Brand</a>
          <ul class="sub-menu">
            @foreach ($merek as $data)
              <li><a href="{{ route('category', $data->id) }}">{{ $data->name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="{{ route('history') }}">History</a>
        <li><a href="{{ route('favorite') }}">Daftar Suka</a>
      </ul>
    </div>
  </nav>
</header>
<!-- Header section end -->
