<!DOCTYPE html>
<html>
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
  <!-- Style Css -->
  <style media="screen">
    body {
      height: 140vh;
      transition: 2s;
      background-color: transparent;
    }
  </style>

</head>
<body id="randombg">

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

  <div class="container">
    <div class="col-lg-12">
      <div class="sparkline11-list shadow-reset mg-t-30">
        <div class="sparkline11-hd">
          <div class="main-sparkline11-hd">
            <h1>Edit Profile</h1>
            <div class="sparkline11-outline-icon">
              <span class="sparkline11-collapse-link"><i class="fa fa-chevron-up"></i></span>
              <span><i class="fa fa-wrench"></i></span>
              <span class="sparkline11-collapse-close"><a href="{{ route('profil', Auth::user()->id) }}"><i class="fa fa-times"></i></a></span>
            </div>
          </div>
        </div>
        <div class="sparkline11-graph">
          <div class="input-knob-dial-wrap">
            <div class="row">
              <div class="col-lg-12">
                <form action="{{ route('akun.simpan', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="{{ $user->email }}" autocomplete="off" name="email" class="form-control">
                  </div>
                  @if ($user->pekerjaan)
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" value="{{ $user->pekerjaan }}" autocomplete="off" name="pekerjaan" class="form-control">
                    </div>
                  @else
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <input type="text" placeholder="Pekerjaan" autocomplete="off" name="pekerjaan" class="form-control">
                    </div>
                  @endif
                  @if ($user->tanggal_lahir)
                    <div class="form-group data-custon-pick" id="data_3">
                      <label><h6>Tanggal Lahir</h6></label>
                      <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="tgl_lahir" class="form-control" value="{{ date('m/d/Y', strtotime($user->tanggal_lahir)) }}">
                      </div>
                    </div>
                  @else
                    <div class="form-group data-custon-pick" id="data_3">
                      <label><h6>Tanggal Lahir</h6></label>
                      <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="tgl_lahir" class="form-control" value="22/11/2000">
                      </div>
                    </div>
                  @endif
                  <div class="form-group">
                    <div class="row">
        							<div class="col-md-12">
        								@if($user->address)
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                          </div>
        								@else
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="address" placeholder="Alamat">
                          </div>
        								@endif
        							</div>
        							<div class="col-md-6">
        								@if($user->kelurahan)
                          <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" value="{{ $user->kelurahan }}">
                          </div>
        								@else
                          <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" placeholder="Kelurahan">
                          </div>
        								@endif
        								@if($user->kabupaten)
                          <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" value="{{ $user->kabupaten }}">
                          </div>
        								@else
                          <div class="form-group">
                            <label>Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten">
                          </div>
        								@endif
        							</div>
        							<div class="col-md-6">
        								@if($user->kecamatan)
                          <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" value="{{ $user->kecamatan }}">
                          </div>
        								@else
                          <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan">
                          </div>
        								@endif
        								@if($user->provinsi)
                          <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" value="{{ $user->provinsi }}">
                          </div>
        								@else
                          <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
                          </div>
        								@endif
        							</div>
                    </div>
                  </div>
                  @if($user->telepon)
                    <div class="form-group">
                      <label>Nomor Telepon</label>
                      <input type="text" class="form-control" name="telepon" value="{{ $user->telepon }}">
                    </div>
                  @else
                    <div class="form-group">
                      <label>Nomor Telepon</label>
                      <input type="text" class="form-control" name="telepon" placeholder="+62 8xx xxxx xxxx">
                    </div>
                  @endif
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="file-upload-inner ts-forms">
                      <div class="input prepend-big-btn">
                        <label class="icon-right" for="prepend-big-btn">
                          <i class="fa fa-download"></i>
                        </label>
                        <div class="file-button">
                          Browse
                          <input type="file" name="gambar" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                        </div>
                        <input type="text" id="prepend-big-btn" name="gambar" placeholder="no file selected">
                      </div>
                    </div>
                  </div><br>

                  <div class="form-group">
                    <button class="btn btn-primary btn-block">Simpan Perubahan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- jquery
  ============================================ -->
  <script src="{{ asset('admin/js/vendor/jquery-1.11.3.min.js') }}"></script>
  <!-- bootstrap JS
  ============================================ -->
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  <!-- meanmenu JS
  ============================================ -->
  <script src="{{ asset('admin/js/jquery.meanmenu.js') }}"></script>
  <!-- mCustomScrollbar JS
  ============================================ -->
  <script src="{{ asset('admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <!-- sticky JS
  ============================================ -->
  <script src="{{ asset('admin/js/jquery.sticky.js') }}"></script>
  <!-- scrollUp JS
  ============================================ -->
  <script src="{{ asset('admin/js/jquery.scrollUp.min.js') }}"></script>
  <!-- counterup JS
  ============================================ -->
  <script src="{{ asset('admin/js/counterup/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('admin/js/counterup/waypoints.min.js') }}"></script>
  <script src="{{ asset('admin/js/counterup/counterup-active.js') }}"></script>
  <!-- peity JS
  ============================================ -->
  <script src="{{ asset('admin/js/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset('admin/js/peity/peity-active.js') }}"></script>
  <!-- sparkline JS
  ============================================ -->
  <script src="{{ asset('admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('admin/js/sparkline/sparkline-active.js') }}"></script>
  <!-- flot JS
  ============================================ -->
  <script src="{{ asset('admin/js/flot/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/js/flot/flot-active.js') }}"></script>
  <!-- map JS
  ============================================ -->
  <script src="{{ asset('admin/js/map/raphael.min.js') }}"></script>
  <script src="{{ asset('admin/js/map/jquery.mapael.js') }}"></script>
  <script src="{{ asset('admin/js/map/france_departments.js') }}"></script>
  <script src="{{ asset('admin/js/map/world_countries.js') }}"></script>
  <script src="{{ asset('admin/js/map/usa_states.js') }}"></script>
  <script src="{{ asset('admin/js/map/map-active.js') }}"></script>
  <!-- data table JS
  ============================================ -->
  <script src="{{ asset('admin/js/data-table/bootstrap-table.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/tableExport.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/data-table-active.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/bootstrap-table-editable.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/bootstrap-editable.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/bootstrap-table-resizable.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/colResizable-1.5.source.js') }}"></script>
  <script src="{{ asset('admin/js/data-table/bootstrap-table-export.js') }}"></script>
  <!-- modal JS
  ============================================ -->
  <script src="{{ asset('admin/js/modal-active.js') }}"></script>
  <!-- touchspin JS
  ============================================ -->
  <script src="{{ asset('admin/js/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
  <script src="{{ asset('admin/js/touchspin/touchspin-active.js') }}"></script>
  <!-- colorpicker JS
  ============================================ -->
  <script src="{{ asset('admin/js/colorpicker/jquery.spectrum.min.js') }}"></script>
  <script src="{{ asset('admin/js/colorpicker/color-picker-active.js') }}"></script>
  <!-- datapicker JS
  ============================================ -->
  <script src="{{ asset('admin/js/datapicker/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('admin/js/datapicker/datepicker-active.js') }}"></script>
  <!-- input-mask JS
  ============================================ -->
  <script src="{{ asset('admin/js/input-mask/jasny-bootstrap.min.js') }}"></script>
  <!-- chosen JS
  ============================================ -->
  <script src="{{ asset('admin/js/chosen/chosen.jquery.js') }}"></script>
  <script src="{{ asset('admin/js/chosen/chosen-active.js') }}"></script>
  <!-- ionRangeSlider JS
  ============================================ -->
  <script src="{{ asset('admin/js/ionRangeSlider/ion.rangeSlider.min.js') }}"></script>
  <script src="{{ asset('admin/js/ionRangeSlider/ion.rangeSlider.active.js') }}"></script>
  <!-- rangle-slider JS
  ============================================ -->
  <script src="{{ asset('admin/js/rangle-slider/jquery-ui-1.10.4.custom.min.js') }}"></script>
  <script src="{{ asset('admin/js/rangle-slider/jquery-ui-touch-punch.min.js') }}"></script>
  <script src="{{ asset('admin/js/rangle-slider/rangle-active.js') }}"></script>
  <!-- knob JS
  ============================================ -->
  <script src="{{ asset('admin/js/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('admin/js/knob/knob-active.js') }}"></script>
  <!-- select2 JS
  ============================================ -->
  <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
  <script src="{{ asset('admin/js/select2/select2-active.js') }}"></script>
  <!-- main JS
  ============================================ -->
  <script src="{{ asset('admin/js/main.js') }}"></script>
  <script src="{{ asset('user/js/main.js') }}"></script>

  <!-- page script -->
  <script>
    setInterval(function() {
      var red = Math.round(Math.random() * 255);
      var green = Math.round(Math.random() * 255);
      var blue = Math.round(Math.random() * 255);

      var bg = "background: rgba(" + red + "," + green + "," + blue + ");";
      var element = document.getElementById('randombg');
      element.style = bg;
    }, 500);
  </script>
</body>
</html>
