<!-- Mobile Menu start -->
<div class="mobile-menu-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="mobile-menu">
          <nav id="dropdown">
            <ul class="mobile-menu-nav">
              <li class="nav-item"><a href="/" class="nav-link dropdown-toggle">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
              <li><a data-toggle="collapse" data-target="#demo" href="#">Order <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                <ul id="demo" class="collapse dropdown-header-top">
                  <li><a href="{{ route('order.index') }}">List Order</a></li>
                  <li><a href="{{ route('order.tampil_cancel') }}">List Batal Order</a></li>
                </ul>
              </li>
              <li><a data-toggle="collapse" data-target="#demo" href="#">Mobil <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                <ul id="demo" class="collapse dropdown-header-top">
                  <li><a href="{{ route('mobil.index') }}">List Mobil</a></li>
                  <li><a href="{{ route('mobil.tampil_hapus') }}">List Mobil Dihapus</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="{{ route('merek.index') }}" class="nav-link dropdown-toggle">Merek <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
              <li class="nav-item"><a href="{{ route('akun.index') }}" class="nav-link dropdown-toggle">Akun <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Mobile Menu end -->
<!-- Breadcome start-->
<div class="breadcome-area des-none">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list map-mg-t-40-gl shadow-reset">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="breadcome-heading">
                <form role="search" class="">
                  <input type="text" placeholder="Search..." class="form-control">
                  <a href=""><i class="fa fa-search"></i></a>
                </form>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <ul class="breadcome-menu">
                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                <li><span class="bread-blod">@yield('halaman')</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcome End-->
