
$(document).ready(function () {
    $(".add-to-cart").click(function () {
        var id = $(this).attr("data-id");
        if (id) {
            console.log(`Перед добавлением продукта в корзину. Id: ${id}`);
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(data);
                console.log(`После добавления продукта в корзину. Id: ${id}, количество продуктов в корзине: ${data}`);
            });
        }
        return false;
    });
});

$(document).ready(function () {
    $(".product_remove").click(function () {
        var id = $(this).attr("data-id");
        // var count = $(this).attr("count");
        if (id) {
            $.post("/cart/productRemove/" + id, {}, function (data) {
                $("#product-count-" + id).html(data);
            });
        }
        return false;
    });

    // Добавление продукта в корзину
    $(".product_add").click(function () {
        var id = $(this).attr("data-id");
        if (id) {
            $.post("/cart/productAdd/" + id, {}, function (data) {
                $("#product-count-" + id).html(data);
            });
        }
        return false;
    });

    $("#checkout").click(function () {
        var totalPrice = document.getElementById("total_price").innerHTML;
        // myArray = totalPrice.split(/([0-9]+)/);
        var numbers = totalPrice.match(/\d+/g).map(Number);
        if (numbers <= 0) {
            // console.log(totalPrice);
            // alert('Корзина пуста');
            alertify.error('Корзина пуста!');
        } else {
            location.href = "/cart/checkout";
        }
    });
    // alert(document.referrer);
    /*$("#confirm-checkout").click(function() {

        if (document.referrer == "http://myshop.net/cart/checkout" && result == "true") {
    alertify.success('Заказ успешно формлен!');
        }
    })*/
    // alert(document.referrer);
});

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});


$('#search_box').keypress(function (e) {
    if (e.which == 13) {
        $('form#search').submit();
        console.log("success!");
        return false; //<---- Add this line
    }
});



$(document).ready(function () {
    $(".delete_good").click(function () {
        $("#confirm-delete").attr("data-id", $(this).attr("data-id"));
    });

    $("#confirm-delete").click(function () {
        var id = $(this).attr("data-id");
        if (id) {
            $.post("/cart/deleteAjax/" + id, {}, function (data) {
                $('.modal').modal("toggle");
                $("#cart_tr-" + id).remove();
                var productInfo = JSON.parse(data);
                console.log(productInfo.totalPrice);
                $("#total_price").html(productInfo.totalPrice + " грн");
            });
        }
        return false;
    });
});
