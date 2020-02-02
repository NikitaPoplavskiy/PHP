<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">             
            <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Добавление нового товара</h2>
                    <form action="#" method="post" enctype="multipart/form-data">                     
                        <p>Название товара</p>   
                        <input type="text" name="name" placeholder="Название" value = "<?php echo $name; ?>"/>
                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="Артикул" value = "<?php echo $code; ?>"/>
                        <p>Стоимость</p>
                        <input type="text" name="price" placeholder="Цена" value="<?php echo $price; ?>"/>
                        <p>Категория</p>                        
                        <select name="category_id">
                            <?php if ($categoryList): ?>
                                <?php foreach($categoryList as $category): ?>
                                    <option value="<?php echo $category["id"]; ?>">
                                        <?php echo $category["name"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="Производитель" value="<?php echo $brand; ?>"/>
                        <p>Изображение товара</p>                        
                        <input type="file" name="image" placeholder="Изображение товара" value=""/>
                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>Описание к товару</p>
                        <input type="text" name="description" placeholder="Описание товара" value="<?php echo $description; ?>"/>
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>Рекомендуем</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected"> Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div><!--/sign up form-->                        
            <br/>
            <br/>                       
            </div>                        
        </div>        
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>