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
		<h2 class="title text-center">Список скидок</h2>
		<a href="/admin/discount/create/" class="btn btn-default">Добавить скидку</a>
		<div style="overflow: auto;">
			<table class="table-bordered table-striped table" style="overflow-x:auto;">
				<!--table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%"-->
				<tr>
					<th>Id скидки</th>
					<th>Название скидки</th>
					<th>Дата начала скидки</th>
					<th>Дата окончания скидки</th>
					<th>Id элемента скидки</th>
					<th>Тип Элемента (Продукт или категория)</th>
					<th>Скидка (в %)</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($discountList as $discount) : ?>
					<tr>
						<td>
							<?php echo $discount["id"]; ?>
						</td>
						<td>
							<?php echo $discount["name"]; ?>
						</td>
						<td>
							<?php echo $discount["date_start"]; ?>
						</td>
						<td>
							<?php echo $discount["date_end"]; ?>
						</td>
						<td>
							<?php echo $discount["item_id"]; ?>
						</td>
						<td>
							<?php echo $discount["item_type"]; ?>
						</td>
						<td>
							<?php echo $discount["discount"]; ?>
						</td>
						<td>
							<a href="/admin/discount/update/<?php echo $discount["id"]; ?>">Редактировать</a>
						</td>
						<td><a href="/admin/discount/delete/<?php echo $discount["id"]; ?>">Удалить</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	</div>
</section>

<?php include ROOT . "/views/layouts/footer_admin.php"; ?>