<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">                    
                    <li class="breadcrumb-item"><a href="/admin/discount">Управление скидками</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Редактирование скидки</li>                    
                </ol>
            </nav>
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result) : ?>
                    <h1>Редактирование прошло успешно!</h1>
                <?php endif; ?>
                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Редактирование скидки №<?php echo $id; ?></h2>
                    <div class="signup-form">
                        <!--sign up form-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Название скидки</p>
                            <input type="text" name="name" placeholder="Название" value="<?php echo $name; ?>" />
                            <p>Дата начала скидки</p>
                            <input type="datetime-local" name="date_start" placeholder="Дата начала скидки" value="<?php echo $date_start; ?>" />
                            <p>Дата окончания скидки</p>
                            <input type="datetime-local" name="date_end" placeholder="Дата окончания скидки" value="<?php echo $date_end; ?>" />                            
                            <p>Id элемента скидки</p>
                            <input type="text" name="item_id" placeholder="Id" value="<?php echo $item_id; ?>" />                            
                            <p>Тип элемента для которого будет применена скидка</p>
                            <input type="text" name="item_type" placeholder="Тип (P или C)" maxlength="1" value="<?php echo $item_type; ?>" />                            
                            <p>Величина скидки</p>
                            <input type="text" name="discount" placeholder="Скидка (в %)" value="<?php echo $discount_; ?>" />                            
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>
                <!--/sign up form-->
                <br />
                <br />
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>