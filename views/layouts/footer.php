<footer id="footer" style="position: absolute; left: 0; right: 0; bottom: 0; height: 50px;">
	<!--Footer-->
	<div class="footer-top">
		<!--div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/template/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/template/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/template/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/template/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="/template/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div-->

		<!--div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div-->

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Интернет-магазин лекарств</p>
					<!--p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p-->
				</div>
			</div>
		</div>

</footer>
<!--/Footer-->



<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<script src="/resources/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<!--script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script-->

<script>
	$(document).ready(function() {
		$(".add-to-cart").click(function() {
			var id = $(this).attr("data-id");
			if (id) {
				console.log(`Перед добавлением продукта в корзину. Id: ${id}`);
				$.post("/cart/addAjax/" + id, {}, function(data) {
					$("#cart-count").html(data);
					console.log(`После добавления продукта в корзину. Id: ${id}, количество продуктов в корзине: ${data}`);
				});
			}
			return false;
		});
	});
</script>

<script>
	$(document).ready(function() {
		$(".product_remove").click(function() {
			var id = $(this).attr("data-id");
			// var count = $(this).attr("count");
			if (id) {
				$.post("/cart/productRemove/" + id, {}, function(data) {
					$("#product-count-" + id).html(data);
				});
			}
			return false;
		});

		// Добавление продукта в корзину
		$(".product_add").click(function() {
			var id = $(this).attr("data-id");
			if (id) {
				$.post("/cart/productAdd/" + id, {}, function(data) {
					$("#product-count-" + id).html(data);
				});
			}
			return false;
		});

		$("#checkout").click(function() {
			var totalPrice = document.getElementById("total_price").innerHTML;
			// myArray = totalPrice.split(/([0-9]+)/);
			var numbers = totalPrice.match(/\d+/g).map(Number);
			if (numbers <= 0) {
				// console.log(totalPrice);
				// alert('Корзина пуста');
				alertify.error('Корзина пуста!');
			} else {
				location.href = "/cart/checkout";
			}
		});
		// alert(document.referrer);
		/*$("#confirm-checkout").click(function() {
			
			if (document.referrer == "http://myshop.net/cart/checkout" && result == "true") {
				alertify.success('Заказ успешно формлен!');
			}
		})*/
		// alert(document.referrer);
	});
</script>

<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});
	});
</script>

<script>
	$('#search_box').keypress(function(e) {
		if (e.which == 13) {
			$('form#search').submit();
			console.log("success!");
			return false; //<---- Add this line
		}
	});
</script>

<script>
	$(document).ready(function() {
		$(".delete_good").click(function() {
			$("#confirm-delete").attr("data-id", $(this).attr("data-id"));
		});

		$("#confirm-delete").click(function() {
			var id = $(this).attr("data-id");
			if (id) {
				$.post("/cart/deleteAjax/" + id, {}, function(data) {
					$('.modal').modal("toggle");
					$("#cart_tr-" + id).remove();
					var productInfo = JSON.parse(data);
					console.log(productInfo.totalPrice);
					$("#total_price").html(productInfo.totalPrice + " грн");
				});
			}
			return false;
		});
	});
</script>

<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script-->
<script src="http://malsup.github.com/jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>
</body>

</html>