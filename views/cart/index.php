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
		</div>
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Корзина</h2>
				<?php if ($productsInCart) : ?>
					<p>Вы выбрали такие товары</p>
					<div style="overflow: auto;">
						<table class="table-bordered table-striped table" id="cart_table">
							<tr>
								<th>Код товара</th>
								<th>Название</th>
								<th>Стоимость</th>
								<th>Количество</th>
							</tr>
							<?php foreach ($products as $product) : ?>
								<?php if ($productsInCart[$product["id"]] <= 0) {
									continue;
								} ?>
								<tr id="cart_tr-<?php echo $product["id"]; ?>">
									<td><?php echo $product["code"]; ?></td>
									<td>
										<a href="/product/<?php echo $product["id"]; ?>">
											<?php echo $product["name"]; ?>
										</a>
									</td>
									<td><?php echo $product["price"]; ?> грн</td>
									<td>
										<button class="product_remove btn btn-default" data-id="<?php echo $product["id"]; ?>">-</button>
										<span id="product-count-<?php echo $product["id"]; ?>">
											<?php echo $productsInCart[$product["id"]]; ?>
										</span>
										<button class="product_add btn btn-default" data-id="<?php echo $product["id"]; ?>">+</button>
										<a href="#" style="color: Tomato; padding-left: 15px;" class="delete_good fa fa-times fa-lg" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $product["id"]; ?>"></a>
									</td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="3">Общая стоимость</td>
								<td id="total_price"><?php echo $totalPrice;?> грн</td>
							</tr>
						</table>
					</div>
					<a type="button" id="checkout" class="btn btn-default">
						Оформить заказ
					</a>
				<?php else : ?>
					<p>Корзина пуста</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Подтверждение действия</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Вы точно хотите удалить товар из корзины?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
					<button type="button" class="btn btn-primary" style="margin-top: 0px" data-dismiss="modal" id="confirm-delete" data-id="">Да</button>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include ROOT . "/views/layouts/footer.php"; ?>