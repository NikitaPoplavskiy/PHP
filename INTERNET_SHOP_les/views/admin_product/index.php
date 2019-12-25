<?php include ROOT."/views/layouts/header.php"; ?>       	
	<section>		
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Каталог товаров</h2>
				<a href="/admin/product/create/" class="btn btn-default">Добавить товар</a>			
				<table class="table-bordered table-striped table">
					<tr>
						<th>Id товара</th>
						<th>Артикул</th>
						<th>Название товара</th>
						<th>Цена</th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach ($productList as $product): ?>
						<tr>
							<td><?php echo $product["id"]; ?></td>
							<td>
								<?php echo $product["code"]; ?>
							</td>
							<td><?php echo htmlspecialchars($product["name"]); ?></td>
							<td><?php echo $product["price"]; ?></td>
							<td>
								<a href="/admin/product/update/<?php echo $product["id"]; ?>">Редактировать</a>
							</td>
							<td><a href="/admin/product/delete/<?php echo $product["id"]; ?>">Удалить</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	</section>
<?php include ROOT."/views/layouts/footer.php"; ?>
