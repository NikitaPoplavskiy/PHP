<?php include ROOT."/views/layouts/header.php"; ?>       	
	<h1>Вы действительно хотите удалить эту категорию? #<?php echo $categoryId ?></h1>
	<form method="POST">
		<input type="submit" name="submit" value="Удалить">
	</form>
<?php include ROOT."/views/layouts/footer.php"; ?>
