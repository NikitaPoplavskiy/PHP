<?php include ROOT . '/views/layouts/header.php'; ?>

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
                    <h2>Редактирование категории №<?php echo $categoryId; ?></h2>
                    <div class="signup-form"><!--sign up form-->
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название категории</p>   
                        <input type="text" name="name" placeholder="Название" value = "<?php echo $category["name"]; ?>"/>
                        <p>Порядок сортировки</p>
                        <input type="text" name="sort_order" placeholder="Порядок сортировки" value = "<?php echo $category["sort_order"]; ?>"/>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php echo $category["status"] > 0 ? "selected" : "";  ?>>Активен</option>
                            <option value="0" <?php echo $category["status"] <= 0 ? "selected" : "";  ?>>Скрыт</option>
                        </select>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
                </div><!--/sign up form-->                        
            <br/>
            <br/>            
            </div>            
        </div>        
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>