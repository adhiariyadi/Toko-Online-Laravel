<div class="left-sidebar-pro">
  <nav id="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('profil', Auth::user()->id) }}">
        @if ( Auth::user()->gambar )
          <img style="width: 100px; height:100px;" class="rounded-circle img-thumbnail" src="{{ asset(Auth::user()->gambar) }}" alt="" />
        @else
          <img class="rounded-circle img-thumbnail" src="{{ asset('admin/img/message/1.jpg') }}" alt="" />
        @endif
      </a>
      <h3>{{ Auth::user()->name }}</h3>
      <p style="text-transform: uppercase;">
        @if ( Auth::user()->pekerjaan )
          {{ Auth::user()->pekerjaan }}
        @else
          N/A
        @endif
      </p>
      <strong>DG</strong>
    </div>
    <div class="left-custom-menu-adp-wrap">
      <ul class="nav navbar-nav left-sidebar-menu-pro">
        <li class="nav-item"><a href="/" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a></li>
        <li class="nav-item">
          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-shopping-bag"></i> <span class="mini-dn">Order</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
          <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
            <a href="{{ route('order.index') }}" class="dropdown-item">List Order</a>
            <a href="{{ route('order.tampil_cancel') }}" class="dropdown-item">List Batal Order</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-car"></i> <span class="mini-dn">Mobil</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
          <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
            <a href="{{ route('mobil.index') }}" class="dropdown-item">List Mobil</a>
            <a href="{{ route('mobil.tampil_hapus') }}" class="dropdown-item">List Mobil Dihapus</a>
          </div>
        </li>
        <li class="nav-item"><a href="{{ route('merek.index') }}" class="nav-link dropdown-toggle"><i class="fa big-icon fa-clipboard"></i> <span class="mini-dn">Merek</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a></li>
        <li class="nav-item"><a href="{{ route('akun.index') }}" class="nav-link dropdown-toggle"><i class="fa big-icon fa-user"></i> <span class="mini-dn">Akun</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a></li>
      </ul>
    </div>
  </nav>
</div>
