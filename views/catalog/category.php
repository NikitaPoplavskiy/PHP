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
									<h4 class="panel-title">
										<a id="category" href="/category/<?php echo $categoryItem["id"]; ?>" class="<?php if ($categoryId == $categoryItem["id"]) echo "active"; ?>">
											<?php echo $categoryItem["name"]; ?>
										</a>
									</h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<!--/category-products-->

					<!--div class="brands_products"><brands_products>
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div></brands_products-->
					<!--price-range-->
					<!--div class="price-range">						
						<h2>Price Range</h2>
						<div class="well text-center">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
							<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div-->
					<!--/price-range-->

					<!--div class="shipping text-center"><shipping>
							<img src="/template/images/home/shipping.jpg" alt="" />
						</div></shipping-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Последние товары</h2>
					<form action="#" method="post">
						<label>Сортировать товары</label>
						<select name="price" class="form-control">
							<option value="priceasc">По увеличению цены</option>
							<option value="pricedesc">По уменьшению цены</option>
							<option value="alpha">по алфавиту</option>
						</select>
						<input type="submit" class="btn btn-default" value="Отсортировать">
					</form>
					<div style="display: flex;">
						<?php foreach ($latestProducts as $product) : ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products" style="height:400px;">
										<div class="productinfo text-center" style="width:237.5px; height:458.5px;">
											<a href="/product/<?php echo $product["id"]; ?>">
												<img src="<?php echo Product::getProductImage($product["id"]); ?>" alt="" />
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
												<p>
													<?php echo $product["name"]; ?>
												</p>
											</a>
											<!--a href="/product/ <?php echo $product["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a-->
											<!--a href="/cart/add/<?php echo $product["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a-->
											<a href="#" class="btn btn-default add-to-cart" data-id=<?php echo $product["id"]; ?>><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
										</div>
										<?php if ($product["is_new"]) : ?>
											<img src="/template/images/home/new.png" class="new" alt="" />
										<?php endif; ?>
										<!--div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?php echo $product["price"] ?></h2>
												<p><?php echo $product["name"] ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div-->
									</div>
									<!--div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div-->
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div style="display:flex; justify-content:center;">
					<?php echo $pagination->get(); ?>
				</div>
			</div>
		</div>
</section>
<?php include ROOT . "/views/layouts/footer.php"; ?>