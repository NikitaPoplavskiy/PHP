<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/order/page-1">Управление заказами</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Просмотреть заказ</li>
                </ol>
            </nav>
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Просмотр заказа #<?php echo $order["id"] ?></h2>
                    <form action="#" method="post">
                        <p>Номер заказа</p>
                        <p><?php echo $order["id"]; ?></p>
                        <p>Имя покупателя</p>
                        <p><?php echo $order["user_name"]; ?></p>
                        <p>Телефон покупателя</p>
                        <p><?php echo $order["user_phone"]; ?></p>
                        <p>Комментарий клиента</p>
                        <p><?php echo $order["user_comment"]; ?></p>
                        <p>Id Клиента</p>
                        <p><?php echo $order["user_id"]; ?></p>
                        <!--p>Изображение товара</p>
                        <input type="file" name="image" placeholder="Изображение товара" value=""/-->
                        <p>Статус заказа</p>
                        <p><?php echo Order::orderStatusToString($order["status"]); ?></p>
                        <p>Дата заказа</p>
                        <p><?php echo $order["date"]; ?></p>
                    </form>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Код товара</th>
                            <th>Название</th>
                            <th>Стоимость</th>
                            <th>Количество</th>
                        </tr>
                        <?php foreach ($products as &$product) : ?>
                            <tr>
                                <td><?php echo $product["code"]; ?></td>
                                <td>
                                    <a href="/product/<?php echo $product["id"]; ?>"></a>
                                    <?php echo $product["name"]; ?>
                                </td>
                                <td><?php echo $product["price"]; ?></td>
                                <td><?php echo $product["quantity"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <!--/sign up form-->
                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>