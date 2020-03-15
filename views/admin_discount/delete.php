<?php include ROOT."/views/layouts/header_admin.php"; ?>       	
	<h1>Вы действительно хотите удалить эту скидку? #<?php echo $id ?></h1>
	<form method="POST">
		<input type="submit" name="submit" value="Удалить">
	</form>
<?php include ROOT."/views/layouts/footer_admin.php"; ?>
