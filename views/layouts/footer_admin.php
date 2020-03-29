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

<script>
	$(document).ready(function() {
		var arrayFromPHP = <?php echo json_encode($order); ?>;

		var status = $('.status_color').html();

		if (status == "Новый заказ") {
			$(".status_color").css("color", "49DA23");
		}
		else if (status == "Обработан") {
			$(".status_color").css("color", "F0E31D");
		}
		else {
			$(".status_color").css("color", "ED3623");
		}
	});
</script>
</body>

</html>