<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">
            <?php if ($isSend): ?>
                <h1>Данные отправлены!</h1>
            <?php else: ?> 
            <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Обратная связь</h2>
                    <form action="#" method="post">                        
                        <input type="email" name="email" placeholder="E-mail" value = "<?php $email; ?>"/>
                        <input type="text" name="message" placeholder="Описание" <?php $message; ?>/>
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить"/>
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