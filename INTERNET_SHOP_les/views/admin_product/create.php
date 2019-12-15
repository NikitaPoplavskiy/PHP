<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">        <
            <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Добавление нового товара №<?php echo $id; ?></h2>
                    <form action="#" method="post">                     
                        <p>Название товара</p>   
                        <input type="text" name="name" placeholder="Название" value = "<?php echo $name?>"/>
                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="Артикул" value = "<?php echo $code?>"/>
                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="Цена" value="<?php echo $price?>"/>
                        <p>Категория</p>
                        <input type="text" name="price" placeholder="Цена" value="<?php echo $price?>"/>
                        <p>Производитель</p>
                        <input type="text" name="price" placeholder="Цена" value="<?php echo $price?>"/>
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="Изображение товара" value="<?php echo $price?>"/>
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