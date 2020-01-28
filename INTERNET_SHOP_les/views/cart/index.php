<?php include ROOT."/views/layouts/header.php"; ?>       	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категория</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php foreach ($categories as $categoryItem): ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="/category/<?php echo $categoryItem["id"];?>">
											<?php echo $categoryItem["name"];?>
											</a>
										</h4>
									</div>
								</div>
							<?php endforeach; ?>							
					</div><!--/category-products-->					
				</div>																															
			</div>
		</div>
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Корзина</h2>
				<?php if($productsInCart): ?>
					<p>Вы выбрали такие товары</p>
					<table class="table-bordered table-striped table" id="cart_table">
						<tr>
							<th>Код товара</th>
							<th>Название</th>
							<th>Стоимость</th>
							<th>Количество</th>
						</tr>
						<?php foreach ($products as $product): ?>
							<?php if($productsInCart[$product["id"]] <= 0) {continue;} ?>
							<tr id="cart_tr">
								<td><?php echo $product["code"]; ?></td>
								<td>
									<a href="/product/<?php echo $product["id"]; ?>"></a>
									<?php echo $product["name"]; ?>
								</td>
								<td><?php echo $product["price"]; ?></td>
								<td>
									<button class="product_remove" data-id="<?php echo $product["id"]; ?>">-</button>
									<span id="product-count-<?php echo $product["id"]; ?>">
										<?php echo $productsInCart[$product["id"]]; ?>
									</span>
									<button class="product_add" data-id="<?php echo $product["id"]; ?>">+</button>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td colspan="3">Общая стоимость</td>
							<td id="total_price"><?php echo $totalPrice;?></td>
						</tr>
				</table>
				<a type="button" id="checkout" class="btn btn-default">
					Оформить заказ
				</a>
				<?php else: ?>
					<p>Корзина пуста</p>
				<?php endif; ?>
			</div>
		</div>							
	</div>
	</section>
<?php include ROOT."/views/layouts/footer.php"; ?>
