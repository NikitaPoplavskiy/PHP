<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
	<div style="display:flex; justify-content:center;">
		<div class="col-sm-5 padding-right">
			<div class="features_items">
				<h2 class="title text-center">Список заказов</h2>
				<div style="overflow: auto; display: flex; flex-wrap: wrap; justify-content: center;">
					<table class="table-bordered table-striped table">
						<tr>
							<th>Номер заказа</th>
							<!--th>Имя заказчика</th-->
							<th>Номер заказчика</th>
							<th>Дата оформления заказа</th>
							<th>Статус</th>
							<th></th>
						</tr>
						<?php foreach ($userOrdersList as $order) : ?>
							<tr>
								<td><?php echo $order["id"]; ?></td>
								<!--td>
								<?php echo $order["user_name"]; ?>
							</td-->
								<td><?php echo $order["user_phone"]; ?></td>
								<td><?php echo $order["date"]; ?></td>
								<td><?php echo Order::orderStatusToString($order["status"]); ?></td>
								<td><a href="/cabinet/order/view/<?php echo $order["id"]; ?>">Просмотреть</a></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
			<div style="display:flex; justify-content:center;">
				<?php echo $pagination->get(); ?>
			</div>
		</div>
	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>