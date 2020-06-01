<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <title>Laravel &mdash; CRUD</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('profile/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/animate-css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/vendors/flaticon/flaticon.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('profile/css/style.css') }}">
      	<link rel="stylesheet" href="{{ asset('user/css/animate.css') }}">
      	<link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('profile/css/responsive.css') }}">
    </head>
    <body>
        <!-- Page Preloder -->
      	<div id="preloder">
      		<div class="loader"></div>
      	</div>

        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
           	<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="banner_content">
						<div class="media">
							<div class="d-flex">
                @if($user->gambar)
                  <img src="{{ asset( $user->gambar ) }}" width="450" alt="">
                @else
                  <img src="{{ asset('profile/img/personal.jpg') }}" height="450" alt="">
                @endif
							</div>
							<div class="media-body">
								<div class="personal_text">
                  @if($user->name)
									  <h3>{{ $user->name }}</h3>
                  @else
									  <h3>Donald McKinney</h3>
                  @endif
                  @if($user->pekerjaan)
									  <h4>{{ $user->pekerjaan }}</h4>
                  @else
									  <h4>Junior UI/UX Developer</h4>
                  @endif
									<ul class="list basic_info">
                    @if($user->tanggal_lahir)
										  <li><a href="#"><i class="lnr lnr-calendar-full"></i>{{ date('l, d F Y', strtotime($user->tanggal_lahir)) }}</a></li>
                    @else
										  <li><a href="#"><i class="lnr lnr-calendar-full"></i>Saturday, 26 October 2002</a></li>
                    @endif
                    @if($user->telepon)
										  <li><a href="#"><i class="lnr lnr-phone-handset"></i>{{ $user->telepon }}</a></li>
                    @else
										  <li><a href="#"><i class="lnr lnr-phone-handset"></i>+62 812 4683 5129</a></li>
                    @endif
                    @if($user->email)
										  <li><a href="#"><i class="lnr lnr-envelope"></i>{{ $user->email }}</a></li>
                    @else
										  <li><a href="#"><i class="lnr lnr-envelope"></i>adhiariyadi40@gmail.com</a></li>
                    @endif
                    @if($user->address && $user->kelurahan && $user->kecamatan && $user->kabupaten && $user->provinsi)
										  <li><a href="#"><i class="lnr lnr-home"></i>{{ $user->address }}, {{ $user->kelurahan }}, {{ $user->kecamatan }}, {{ $user->kabupaten }}, {{ $user->provinsi }}</a></li>
                    @else
										  <li><a href="#"><i class="lnr lnr-home"></i>Ponorogo, Jawa Timur</a></li>
                    @endif
									</ul>
								</div><br><br>
                <a href="/" class="btn btn-primary">Home</a>
                <a href="{{ route('edit_profil', Auth::user()->id) }}" class="btn btn-success">Edit Profile</a>
                <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('profile/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('profile/js/popper.js') }}"></script>
        <script src="{{ asset('profile/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('profile/js/stellar.js') }}"></script>
        <script src="{{ asset('profile/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('profile/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('profile/vendors/counter-up/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('profile/js/mail-script.js') }}"></script>
        <script src="{{ asset('profile/js/theme.js') }}"></script>
        <script src="{{ asset('user/js/main.js') }}"></script>
    </body>
</html>
