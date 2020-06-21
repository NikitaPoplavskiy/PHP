<?php include ROOT . "/views/layouts/header_admin.php"; ?>
<section>
	<div style="display:flex; justify-content:center;">
		<div class="col-sm-5 padding-right">
			<div class="features_items">
			</div>
			<br>
			<h2 class="title text-center">Список заказов</h2>
			<div style="overflow: auto; display: flex; flex-direction:column;">
				<table class="table-bordered table-striped table">
					<tr>
						<th>Номер заказа</th>
						<th>Имя заказчика</th>
						<th>Номер заказчика</th>
						<th>Дата оформления заказа</th>
						<th>Статус</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<?php foreach ($ordersList as $order) : ?>
						<tr>
							<td style="display:flex; justify-content:center;"><?php echo $order["id"]; ?></td>
							<td>
								<?php echo $order["user_name"]; ?>
							</td>
							<td><?php echo $order["user_phone"]; ?></td>
							<td><?php echo $order["date"]; ?></td>
							<td class="status_color" color=<?php echo $order["status"] ?>><?php echo Order::orderStatusToString($order["status"]); ?></td>
							<td><a href="/admin/order/view/<?php echo $order["id"]; ?>">Просмотреть</a></td>
							<td>
								<a href="/admin/order/update/<?php echo $order["id"]; ?>">Редактировать</a>
							</td>
							<td><a href="/admin/order/delete/<?php echo $order["id"]; ?>">Удалить</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<div style="display:flex; justify-content:center;">
					<?php echo $pagination->get(); ?>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php include ROOT . "/views/layouts/footer_admin.php"; ?>