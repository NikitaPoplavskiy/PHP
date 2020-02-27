<footer id="footer" style="position: absolute; left: 0; right: 0; bottom: 0; height: 50px;">
	<!--Footer-->
	<div class="footer-top">
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Интернет-магазин лекарств</p>
					<!--p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p-->
				</div>
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
<script src="http://malsup.github.com/jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>

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
					console.log($("#product-count-" + id).html());
					if ($("#product-count-" + id).html() <= 0) {
						$("#cart_tr").remove();
					}
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
					/*console.log(JSON.stringify(data));
					console.log(`Product ID: ${''id}` );
					console.log(data['' + id]);
					$("#product-count-" + id).html(data['' + id]);*/
				});
			}
			return false;
		});


		$("#checkout").click(function() {
			var totalPrice = document.getElementById("total_price").innerHTML;
			if (totalPrice <= 0) {
				console.log(totalPrice);
				alert('Корзина пуста');
			} else {
				location.href = "/cart/checkout";
			}
		});

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

<!-- TODO: Создать подвал для админки и переместить этот код туда -->
<script>
	$(document).ready(function() {
		var data = {
			// A labels array that can contain any sort of values
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
			// Our series array that contains series objects or in this case series data arrays
			series: [
				[5, 2, 4, 2, 0]
			]
		};

		// Create a new line chart object where as first parameter we pass in a selector
		// that is resolving to our chart container element. The Second parameter
		// is the actual data object.
		// new Chartist.Line('.ct-chart', data);
	});
</script>

<script>
	$(document).ready(function() {
		$(".recipe_image").click(function() {
			$("#recipe").attr("aria-hidden", false);
			var id = $(this).attr("data-id");
			$("#recipe_image").attr("src", "/upload/images/recipes/" + id + ".jpg");
			return true;
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

</body>

</html>