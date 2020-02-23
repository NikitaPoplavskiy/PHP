<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (is_null($order) || $order == false) : ?>
                    <h1>Заказ не найден</h1>
                <?php else : ?>
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Просмотр заказа #<?php echo $order["id"] ?></h2>
                        <div>
                            <p>Статус заказа</p>
                            <p><?php echo AdminOrderController::orderStatusToString($order["status"]); ?></p>
                            <p>Дата заказа</p>
                            <p><?php echo $order["date"]; ?></p>
                        </div>
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
                <?php endif; ?>
                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>