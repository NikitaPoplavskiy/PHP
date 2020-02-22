<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (count($recipes) > 0) : ?>
                    <h3>Мои рецепты</h3>
                    <table class="table-bordered table-striped table" id="cart_table">
                        <tr>
                            <th>Код рецепта</th>
                            <th>Дата загрузки</th>
                            <th>Статус</th>
                            <th></th>
                        </tr>
                        <?php foreach ($recipes as $recipe) : ?>
                            <tr id="cart_tr-<?php echo $recipe["id"]; ?>">
                                <td><?php echo $recipe["id"]; ?></td>
                                <td>
                                    <?php echo $recipe["date_created"]; ?>
                                </td>
                                <td><?php echo $recipe["status"]; ?></td>
                                <td>                                    
                                    <span id="product-count-<?php echo $recipe["id"]; ?>">
                                        <?php echo $recipe["id"]; ?>
                                    </span>                                    
                                    <!--a href="#"  style="color: Tomato; padding-left: 15px;" class="delete_good fa fa-times fa-lg" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $recipe["id"]; ?>"></a-->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
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
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>