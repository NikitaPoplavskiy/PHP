<?php include ROOT . "/views/layouts/header_admin.php"; ?>
<section>
	<div class="col-sm-12 padding-right">
		<div class="features_items">
			<!--div class="social-icons pull-left">
				<ul class="nav navbar-nav">
					<li><a href="/admin"><i class="">Главная</i></a></li>
					<li><a href="/admin/category"><i class="">Управление категориями</i></a></li>
					<li><a href="/admin/order"><i class="">Управление заказами</i></a></li>
					<li><a href="/admin/recipes/page-1"><i class="">Управление рецептами</i></a></li>
					<li><a href="/admin/stat"><i class="">Управление Стастистика</i></a></li>
				</ul>
			</div-->
			<!--nav aria-label="breadcrumb">
				<ol class="breadcrumb">					
					<li class="breadcrumb-item"><a href="/admin">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">Управление товарами</li>
					<li class="breadcrumb-item"><a href="/admin/category">Управление категориями</a></li>
					<li class="breadcrumb-item"><a href="/admin/order">Управление заказами</a></li>
					<li class="breadcrumb-item"><a href="/admin/recipes/page-1">Управление рецептами</a></li>
					<li class="breadcrumb-item"><a href="/admin/stat">Управление Стастистика</a></li>
				</ol>
			</nav-->
		</div>
		<br>
		<h2 class="title text-center">Каталог товаров</h2>
		<a href="/admin/product/create/" class="btn btn-default">Добавить товар</a>
		<div style="overflow: auto; display: flex; flex-direction:column;">
			<table class="table-bordered table-striped table" style="overflow-x:auto;">
				<!--table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%"-->
				<tr>
					<th>Id товара</th>
					<th>Артикул</th>
					<th>Название товара</th>
					<th>Цена</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($productList as $product) : ?>
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
			<div style="display:flex; justify-content:center;">
				<?php echo $pagination->get(); ?>
			</div>
		</div>
	</div>
	</div>
</section>

<?php include ROOT . "/views/layouts/footer_admin.php"; ?>