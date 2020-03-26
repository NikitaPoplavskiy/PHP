<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (count($recipes) > 0) : ?>
                    <h3>Мои рецепты</h3>
                    <div style="overflow: auto;">
                        <table class="table-bordered table-striped table" id="cart_table">
                            <tr>
                                <th>Код рецепта</th>
                                <th>Дата загрузки</th>
                                <th>Статус</th>
                            </tr>
                            <?php foreach ($recipes as $recipe) : ?>
                                <tr id="cart_tr-<?php echo $recipe["id"]; ?>">
                                    <td><a data-toggle="modal" data-target="#exampleModal" href="#" class="recipe_image" data-id="<?php echo $recipe["id"]; ?>"><?php echo $recipe["id"]; ?></a></td>
                                    <td>
                                        <?php echo $recipe["date_created"]; ?>
                                    </td>
                                    <td>
                                        <?php if ($recipe["status"] == 0) : ?> Рецепт в обработке <?php elseif ($recipe["status"] == 1) : ?> Рецепт действителен <?php else : ?> Рецепт недействителен <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <h3>Загрузите новый рецепт</h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image" value="">
                        <!--button type="submit" name="upload">Загрузить</button-->
                        <input type="submit" name="submit" class="btn btn-default" value="Загрузить">
                    </form>
                <?php else : ?>
                    <p>Нет загруженых рецептов</p>
                    <h3>Загрузите новый рецепт</h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image" value="">
                        <!--button type="submit" name="upload">Загрузить</button-->
                        <input type="submit" name="submit" class="btn btn-default" value="Загрузить">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!--MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Рецепт</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y:auto;">
                    <img id="recipe_image" src="" alt="">
                </div>
                <!--div class="modal-footer">
					<button type="button" class="btn btn-primary" style="margin-top: 0px" data-dismiss="modal" id="confirm-delete" data-id="">Да</button>
				</div-->
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>