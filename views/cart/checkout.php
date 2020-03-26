<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result) : ?>
                    <!--h1>Заказ оформлен!</h1-->
                    <div style="display:flex; justify-content:center; align-items: center; flex-direction:column;">
                        <div style="display:flex; justify-content:center; align-items: center; flex-direction:column;">
                            <i class="fa fa-check fa-5x" style="color:#5CFF31; " aria-hidden="true"></i>
                            <h2>С вами свяжутся в ближайшее время для подтверждения заказа!</h2>
                            <a href="/">Вернуться на главную</a>
                        </div>
                    </div>
                    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                    <script>
                        alertify.success('Заказ успешно оформлен!');
                    </script>
                <?php else : ?>
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Оформление заказа</h2>
                        <p>Вы заказали столько товара: <?php echo $totalQuantity; ?> На сумму <?php echo $totalPrice; ?> </p>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $userName ?>" />
                            <input type="text" name="phone" placeholder="Ваш номер телефона" value="<?php echo $userPhone ?>" />
                            <input type="text" name="comment" placeholder="Комментарий к заказу" value="<?php echo $userComment ?>" />
                            <iframe src="https://www.google.com/maps/d/embed?mid=1A83Ei34GS9c6ypmEXP7TQGLZo-5a0BDt" width="640" height="450" frameborder="0" style="border:0" allowfullscreen="false"></iframe>
                            <input type="submit" name="submit" id="confirm-checkout" class="btn btn-default" value="Оформить" data-result="<?php echo $result; ?>" />
                        </form>
                    </div>
                    <!--/sign up form-->
                    <br />
                    <br />
            </div>
        <?php endif; ?>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>