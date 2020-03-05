<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">                    
                    <li class="breadcrumb-item"><a href="/admin/product">Управление товарами</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Редактировать товар</li>                    
                </ol>
            </nav>
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result) : ?>
                    <h1>Товар отредактирован!</h1>
                <?php endif; ?>
                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Редактирование товара №<?php echo $id; ?></h2>
                    <div class="signup-form">
                        <!--sign up form-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Название товара</p>
                            <input type="text" name="name" placeholder="Название" value="<?php echo $product["name"]; ?>" />
                            <p>Артикул</p>
                            <input type="text" name="code" placeholder="Артикул" value="<?php echo $product["code"]; ?>" />
                            <p>Стоимость</p>
                            <input type="text" name="price" placeholder="Цена" value="<?php echo $product["price"]; ?>" />
                            <p>Категория</p>
                            <select name="category_id">
                                <?php if ($categoryList) : ?>
                                    <?php foreach ($categoryList as $category) : ?>
                                        <option <?php echo $category["id"] == $product["category_id"] ? "selected" : ""; ?> value="<?php echo $category["id"]; ?>">
                                            <?php echo $category["name"]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <p>Производитель</p>
                            <input type="text" name="brand" placeholder="Производитель" value="<?php echo $product["brand"]; ?>" />
                            <p>Изображение товара</p>
                            <img src="<?php echo Product::getProductImage($product["id"]); ?>" alt="">
                            <input type="file" name="image" placeholder="Изображение товара" value="" />
                            <p>Наличие на складе</p>
                            <select name="availability">
                                <option value="1" <?php echo $product["availability"] > 0 ? "selected" : "";  ?>>Да</option>
                                <option value="0" <?php echo $product["availability"] <= 0 ? "selected" : "";  ?>>Нет</option>
                            </select>
                            <p>Описание к товару</p>
                            <input type="text" name="description" placeholder="Описание товара" value="<?php echo $product["description"]; ?>" />
                            <p>Новинка</p>
                            <select name="is_new">
                                <option value="1" <?php echo $product["is_new"] > 0 ? "selected" : "";  ?>>Да</option>
                                <option value="0" <?php echo $product["is_new"] <= 0 ? "selected" : "";  ?>>Нет</option>
                            </select>
                            <p>Рекомендуем</p>
                            <select name="is_recommended">
                                <option value="1" <?php echo $product["is_recommended"] > 0 ? "selected" : "";  ?>>Да</option>
                                <option value="0" <?php echo $product["is_recommended"] <= 0 ? "selected" : "";  ?>>Нет</option>
                            </select>
                            <p>Статус</p>
                            <select name="status">
                                <option value="1" <?php echo $product["status"] > 0 ? "selected" : "";  ?>> Отображается</option>
                                <option value="0" <?php echo $product["status"] <= 0 ? "selected" : "";  ?>>Скрыт</option>
                            </select>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>
                <!--/sign up form-->
                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>