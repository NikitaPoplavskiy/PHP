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
                    <h2>Добавление новой категории</h2>
                    <form action="#" method="post" enctype="multipart/form-data">                     
                        <p>Название категории</p>   
                        <input type="text" name="name" placeholder="Название" value = "<?php echo $name; ?>"/>
                        <p>Порядок сортировки</p>
                        <input type="text" name="sort_order" placeholder="Порядок сортировки" value = "<?php echo $sort_order; ?>"/>
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Активна</option>
                            <option value="0">Скрыта</option>
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

<?php include ROOT . '/views/layouts/footer.php'; ?>