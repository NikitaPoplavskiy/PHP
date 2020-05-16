<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">                                                    
                <h1>Кабинет пользователя</h1>
                <h3>Привет, <?php echo $user["name"]; ?></h3>
                <ul>
                    <li><a href="/cabinet/edit">Редактировать данные</a></li>
                    <li><a href="/cabinet/history/page-1">Список покупок</a></li>
                    <li><a href="/cabinet/recipes">Мои рецепты</a></li>
                </ul>

            </div>            
        </div>        
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>