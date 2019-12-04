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
	</div>
	</section>
<?php include ROOT."/views/layouts/footer.php"; ?>
