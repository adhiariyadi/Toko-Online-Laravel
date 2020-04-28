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
        <li><a href="{{ route('mobil.tambah') }}">Jual Mobil</a>
        <li><a href="{{ route('pembayaran', Auth::user()->id) }}">Belanja</a>
        @if (Auth::user()->role == 'admin')
          <li><a href="#">Order</a>
            <ul class="sub-menu">
              <li><a href="{{ route('order.index') }}">List Order Belum Dibayar</a></li>
              <li><a href="{{ route('order.tampil_pending') }}">List Order Dipending</a></li>
              <li><a href="{{ route('order.tampil_bayar') }}">List Order Sudah Dibayar</a></li>
              <li><a href="{{ route('order.tampil_cancel') }}">List Order Dicancel</a></li>
            </ul>
          </li>
          <li><a href="#">Mobil</a>
            <ul class="sub-menu">
              <li><a href="{{ route('mobil.index') }}">List Mobil</a></li>
              <li><a href="{{ route('mobil.tampil_hapus') }}">List Mobil Dihapus</a></li>
            </ul>
          </li>
          <li><a href="{{ route('merek.index') }}">Merek</a>
          <li><a href="{{ route('akun.index') }}">Akun</a>
        @else

        @endif
      </ul>
    </div>
  </nav>
</header>
<!-- Header section end -->
