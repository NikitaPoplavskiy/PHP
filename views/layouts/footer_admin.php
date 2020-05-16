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
	/*$(document).ready(function() {
		// var arrayFromPHP = <?php echo json_encode($ordersList) ?>;

		var status = $('.status_color').html();
		$(status).ready(function() {
			if (status == "Новый заказ") {
				$(this).css("color", "green");
			} else if (status == "Обработан") {
				$(this).css("color", "yellow");
			} else {
				$(this).css("color", "red");
			}
		})

	});*/

	$(window).load(function() {
		var status = $('.status_color').html();

		if (status == "Новый заказ") {
			$(status).css("color", "green");
		} else if (status == "Обработан") {
			$(status).css("color", "yellow");
		} else {
			$(status).css("color", "red");
		}
	});

	// $("color").attr()

	/*var status = $('.status_color').html();

    $(".status_color").on({
        mouseenter: function(){
			if (status == "Обработан") {
				$(this).css("color", "green");
			}            
        }
    });    
});*/
</script>

</body>

</html>