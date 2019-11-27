<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">
            <?php if ($result): ?>
                <h1>Данные успешно отредактированы!</h1>
            <?php else: ?> 
            <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Редактирование данных</h2>
                    <form action="#" method="post">                        
                        <input type="text" name="name" placeholder="Имя" value = "<?php echo $user["name"]?>"/>                    
                        <input type="password" name="password" placeholder="Пароль" value = "<?php echo $user["password"] ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Отредактировать"/>
                    </form>
                </div><!--/sign up form-->                        
            <br/>
            <br/>            
            </div>
            <?php endif; ?>
        </div>        
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>