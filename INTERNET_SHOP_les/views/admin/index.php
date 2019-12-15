<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">             
            <div class = "col-sm-4 col-sm-offset-4 padding-right">                                                    
                <h1>Кабинет Администратора</h1>
                <h3>Привет, Администратор</h3>
                <ul>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                </ul>
            </div>            
        </div>        
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>