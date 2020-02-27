<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result) : ?>
                    <!--h1>Вы зарегистированы!</h1-->
                    <div style="display:flex; justify-content:center; align-items: center;">
                        <div style="display:flex; justify-content:center; align-items: center; flex-direction:column;">
                            <i class="fa fa-check fa-5x" style="color:#5CFF31; " aria-hidden="true"></i>
                            <a href="/">Вернуться на главную</a>
                            <a href="/user/login">Перейти на страницу входа</a>
                        </div>
                    </div>
                    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                    <script>
                        alertify.success('Вы успешно зарегистрированы!');
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
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name ?>" />
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>" />
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password ?>" />
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
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