<?php include ROOT."/views/layouts/header_admin.php"; ?>       	
	<section>		
		<div class="col-sm-9 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Список категорий</h2>
				<a href="/admin/category/create/" class="btn btn-default">Добавить категорию</a>	
				<table class="table-bordered table-striped table">
					<tr>
						<th>Id</th>
						<th>Название категории</th>
						<th>Порядок сортировки</th>
						<th>Статус</th>						
						<th></th>
						<th></th>
					</tr>
					<?php foreach ($categoryList as $category): ?>
						<tr>
							<td><?php echo $category["id"]; ?></td>
							<td>
								<?php echo $category["name"]; ?>
							</td>
							<!--td><?php echo htmlspecialchars($product["name"]); ?></td-->
							<td><?php echo $category["sort_order"]; ?></td>
							<td><?php echo AdminCategoryController::categoryStatusToString($category["status"]); ?></td>
							<td>
								<a href="/admin/category/update/<?php echo $category["id"]; ?>">Редактировать</a>
							</td>
							<td><a href="/admin/category/delete/<?php echo $category["id"]; ?>">Удалить</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	</section>
<?php include ROOT."/views/layouts/footer_admin.php"; ?>
