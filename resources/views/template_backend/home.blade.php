<!doctype html>
<html class="no-js" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#000000">
  <meta name="description" content="Web site created using create-react-app">
  <link rel="apple-touch-icon" href="{{ asset('logo192.png') }}">
  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laravel &mdash; CRUD</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Fonts
	============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
  <!-- Bootstrap CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
  <!-- Bootstrap CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
  <!-- adminpro icon CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminpro-custon-icon.css') }}">
  <!-- meanmenu icon CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/meanmenu.min.css') }}">
  <!-- mCustomScrollbar CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/jquery.mCustomScrollbar.min.css') }}">
  <!-- animate CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/animate.css') }}">
  <!-- data-table CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/data-table/bootstrap-editable.css') }}">
  <!-- normalize CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
  <!-- charts C3 CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/c3.min.css') }}">
  <!-- forms CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/form/all-type-forms.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/form/themesaller-forms.css') }}">
  <!-- modals CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/modals.css') }}">
  <!-- touchspin CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/touchspin/jquery.bootstrap-touchspin.min.css') }}">
  <!-- datapicker CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/datapicker/datepicker3.css') }}">
  <!-- colorpicker CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/colorpicker/colorpicker.css') }}">
  <!-- select2 CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/select2/select2.min.css') }}">
  <!-- chosen CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/chosen/bootstrap-chosen.css') }}">
  <!-- ionRangeSlider CSS
  ============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/ionRangeSlider/ion.rangeSlider.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/ionRangeSlider/ion.rangeSlider.skinFlat.css') }}">
  <!-- style CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
	<link rel="stylesheet" href="{{ asset('user/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
  <!-- responsive CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
  <!-- responsive CSS
	============================================ -->
  <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
  <!-- modernizr JS
	============================================ -->
  <script src="{{ asset('admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body class="materialdesign">
  <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

	<!-- Page Preloder -->
	{{-- <div id="preloder">
		<div class="loader"></div>
	</div> --}}

  <!-- Header top area start-->
  <div class="wrapper-pro">
    @include('template_backend.sidebar')
    <div class="content-inner-all">
      @include('template_backend.navbar')
    <!-- Header top area end-->
          <!-- Breadcome start-->
          <div class="breadcome-area mg-b-30 small-dn">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
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
                                          <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                          </li>
                                          <li><span class="bread-blod">@yield('halaman')</span>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Breadcome End-->
          @include('template_backend.mobile')
          <!-- welcome Project, sale area start-->
          <div class="welcome-adminpro-area">
            <div class="container-fluid">
              <div class="row">
                @yield('content')
              </div>
            </div>
          </div>
      </div>
  </div>

@include('template_backend.footer')
