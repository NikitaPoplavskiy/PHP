<?php include ROOT . "/views/layouts/header.php"; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Категория</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						<?php foreach ($categories as $categoryItem) : ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/category/<?php echo $categoryItem["id"]; ?>">
											<?php echo $categoryItem["name"]; ?>
										</a>
									</h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="product-details">
					<!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img src="<?php echo Product::getProductImage($product["id"]); ?>" alt="" />
							<h3>Приблизить</h3>
						</div>
						<!--div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <Wrapper for slides>
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <Controls>
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div-->
					</div>
					<div class="col-sm-7">
						<div class="product-information">
							<!--/product-information-->
							<?php if ($product["is_new"] > 0) : ?>
								<img src="<?php echo Product::getProductImage($product["id"]); ?>" class="newarrival" alt="" />
							<?php endif; ?>
							<h2><?php echo $product["name"]; ?></h2>
							<p>ID: <?php echo $product["code"]; ?></p>
							<!--img src="/template/images/product-details/rating.png" alt="" /-->
							<span>
								<span>
									<?php if ($product["discount_price"] == false) : ?>
										<h2><?php echo $product["price"]; ?> грн</h2>
									<?php else : ?>
										<div class="style-4">
											<del>
												<h3><?php echo $product["price"]; ?> грн</h3>
											</del>
											<div>
												<h2><?php echo $product["discount_price"] ?> грн</h2>
											</div>
										</div>
									<?php endif; ?>
								</span>
								<!--label>Количество:</label>
								<input type="text" value="<?php echo Cart::countItems(); ?>"/-->
								<!--button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button-->
							</span>
							<br>
							<a href="#" class="btn btn-default add-to-cart" data-id=<?php echo $product["id"]; ?>><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
							<p><b>Наличие:</b>&nbsp;<?php echo ($product["availability"] > 0) ? "В наличии" : " Нет в наличии"; ?></p>

							<p><b>Состояние:</b>&nbsp;<?php echo ($product["is_new"] > 0) ? "Новый" : "Не новый"; ?></p>
							<p><b>Производитель:</b>&nbsp;<?php echo $product["brand"]; ?></p>
							<!--a href=""><img src="/template/images/product-details/share.png" class="share img-responsive"  alt="" /></a-->
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->
				<!--category-tab-->
				<!--div class="category-tab shop-details-tab">					
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Детали</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Профиль компании</a></li>
							<li><a href="#tag" data-toggle="tab">Тег</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Отзывы</a></li>
						</ul>
					</div-->

				<!--div class="tab-content">
						<div class="tab-pane fade" id="details">
							<div class="col-sm-3">
								<div class="single-products">
									<div class="productinfo text-center">
										<?php echo $product["description"]; ?>
									</div>
								</div>
							</div-->


				<!--div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div-->

				<!--div class="tab-pane fade" id="tag">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div-->

				<!--div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>

									<form action="#">
										<span>
											<input type="text" placeholder="Your Name" />
											<input type="email" placeholder="Email Address" />
										</span>
										<textarea name=""></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div-->
			</div>
		</div>
		<!--/category-tab-->
		<?php echo $product["description"]; ?>
		<h2 class="title text-center">Рекомендуемые товары</h2>
		<div class="recommended_items">
			<div class="owl-carousel owl-theme text-center">
				<?php foreach ($recomendedProducts as $rProduct) : ?>
					<div class="item productinfo">
						<a href="/product/<?php echo $rProduct["id"]; ?>">
							<img src="<?php echo Product::getProductImage($rProduct["id"]); ?>" alt="" />
							<h2><?php echo $rProduct["price"]; ?> грн</h2>
							<p><?php echo $rProduct["name"]; ?></p>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	</div>
	</div>
</section>

<?php include ROOT . "/views/layouts/footer.php"; ?>