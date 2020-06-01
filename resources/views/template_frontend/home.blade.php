<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Laravel &mdash; CRUD</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/flaticon.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/slicknav.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/jquery-ui.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />

	@yield('css')

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

  	@include('template_frontend.navbar')

	@yield('content')

  	@include('template_frontend.footer')
