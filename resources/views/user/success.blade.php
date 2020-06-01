@extends('template_frontend.home')
@section('content')
	<!-- checkout section  -->
	<section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">Yay! Finish</h2>
                    <img src="{{ asset('img/ic_success.png') }}" width="450" alt="">
                    <h6 class="mt-2">Pembayaran anda berhasil<br>Mohon tunggu konfirmasi dari admin</h6>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-5" style="width: 200px;">Back to Home</a>
                </div>
            </div>
		</div>
	</section>
	<!-- checkout section end -->
@endsection
