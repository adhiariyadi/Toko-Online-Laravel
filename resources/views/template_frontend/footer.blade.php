	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="{{ asset('user/img/cards.png') }}" alt="">
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>www.coding.cox</p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>Jl Anggur No 21A, Keniten, Ponorogo, Ponorgo, Jawa Timur, Indonesia</p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+62 812 4683 5129</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>adhiariyadi40@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="https://vk.com/id571671195" class="vk"><i class="fa fa-vk"></i><span>Vk</span></a>
					<a href="https://t.me/Didotz_AE" class="telegram"><i class="fa fa-telegram"></i><span>Telegram</span></a>
					<a href="https://www.instagram.com/didotz_poetra_ae/" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="https://www.facebook.com/profile.php?id=100007787444809" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="https://twitter.com/Didotz9" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="https://api.whatsapp.com/send?phone=6281246835129" class="whatsapp"><i class="fa fa-whatsapp"></i><span>whatsapp</span></a>
					<a href="https://www.youtube.com/channel/UCSU_al9Rti8l4AQtgb4dZlg?view_as=subscriber" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
				</div>

				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				<p class="text-white text-center mt-5">Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.youtube.com/channel/UCSU_al9Rti8l4AQtgb4dZlg?view_as=subscriber" target="_blank">Didotz Gaming</a></p>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('user/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('user/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('user/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('user/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('user/js/main.js') }}"></script>

	<script type="text/javascript">
	  $(".update_cart-cart").click(function (e) {
	    e.preventDefault();
	    var ele = $(this);
	    $.ajax({
	      url: '{{ url('update_cart') }}',
	      method: "patch",
	      data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".new-quantity").val()},
	      success: function (response) {
	        window.location.reload();
	      }
	    });
	  });

	  $(".remove-from-cart").click(function (e) {
	    e.preventDefault();
	    var ele = $(this);
	    if(confirm("Are you sure")) {
	      $.ajax({
	        url: '{{ url('remove') }}',
	        method: "DELETE",
	        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
	        success: function (response) {
	          window.location.reload();
	        }
	      });
	    }
	  });
	</script>

</body>

</html>
