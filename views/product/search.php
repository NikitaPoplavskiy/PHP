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
					<!--/category-products-->
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Результаты поиска</h2>
					<?php if (count($foundProducts) == 0): ?>
						<h1>Ничего не найдено</h1>
					<?php else: ?>
					<?php foreach ($foundProducts as $product) : ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="/product/<?php echo $product["id"]; ?>">
											<img src="<?php echo Product::getProductImage($product["id"]); ?>" alt="" />
											<h2><?php echo $product["price"]; ?> грн</h2>
											<p>
												<?php echo $product["name"]; ?>
											</p>
										</a>
										<!--a href="/product/ <?php echo $product["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a-->
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
					<?php endif; ?>		
				</div>
			</div>
		</div>
</section>
<?php include ROOT . "/views/layouts/footer.php"; ?>