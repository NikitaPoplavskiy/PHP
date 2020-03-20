<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/order/page-1">Управление заказами</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Редактировать заказ</li>
                </ol>
            </nav>
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Редактирование заказа №<?php echo $id; ?></h2>
                    <div class="signup-form">
                        <!--sign up form-->
                        <form action="#" method="post">
                            <p>Номер заказа</p>
                            <p><?php echo $order["id"]; ?></p>
                            <p>Имя покупателя</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $order["user_name"]; ?>" />
                            <p>Телефон покупателя</p>
                            <input type="text" name="phone" placeholder="Номер телефона" value="<?php echo $order["user_phone"]; ?>" />
                            <p>Комментарий клиента</p>
                            <input type="text" name="comment" placeholder="Комментарий к заказу" value="<?php echo $order["user_comment"]; ?>" />
                            <!--p>Изображение товара</p>
                        <input type="file" name="image" placeholder="Изображение товара" value=""/-->
                            <p>Id Клиента</p>
                            <input type="text" name="user_id" placeholder="Id" value="<?php echo $order["user_id"]; ?>" />
                            <p>Статус заказа</p>
                            <select name="status">
                                <option value="1" <?php echo $order["status"] == 1 ? "selected" : "";  ?>>Новый заказ</option>
                                <option value="2" <?php echo $order["status"] == 2 ? "selected" : "";  ?>>В обработке</option>
                                <option value="3" <?php echo $order["status"] == 3 ? "selected" : "";  ?>>Обработан</option>
                            </select>
                            <p>Дата заказа</p>
                            <input type="text" name="date" placeholder="Дата" value="<?php echo $order["date"]; ?>" />
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