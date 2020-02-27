<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="/template/css/bootstrap.min.css" rel="stylesheet">
	<link href="/template/css/font-awesome.min.css" rel="stylesheet">
	<!--link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"-->
	<link href="/template/css/prettyPhoto.css" rel="stylesheet">
	<link href="/template/css/price-range.css" rel="stylesheet">
	<link href="/template/css/animate.css" rel="stylesheet">
	<link href="/template/css/main.css" rel="stylesheet">
	<link href="/template/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="/resources/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="/resources/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="/resources/frameworks/chartist.min.css">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
</head>
<!--/head-->

<body style="min-height:100%; position:relative; padding-bottom: 70px; ">
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<!--div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div-->
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<!--li><a href="#"><i class="fa fa-twitter"></i></a></li-->
								<!--li><a href="#"><i class="fa fa-linkedin"></i></a></li-->
								<!--li><a href="#"><i class="fa fa-dribbble"></i></a></li-->
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a class="logo" href="/"><img src="/template/images/home/main_logo.png" alt="" /></a>
						</div>
						<div class="header-bottom">
							<!--header-bottom-->
							<div class="container">
								<div class="row">
									<div class="col-sm-9">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
										<div class="mainmenu pull-left">
											<ul class="nav navbar-nav collapse navbar-collapse">
												<li><a href="/" class="active">Главная</a></li>
												<li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
													<ul role="menu" class="sub-menu">
														<li><a href="/catalog/">Каталог</a></li>
														<!--li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li-->
													</ul>
												</li>
												<li class="dropdown"><a href="/blog/">Блог<i class="fa fa-angle-down_"></i></a>
												</li>
												<li><a href="/about/">О магазине</a></li>
												<li><a href="/contacts/">Контакты</a></li>
											</ul>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="search_box pull-right">
											<form id="search" action="/search" method="post" enctype="multipart/form-data">
												<input id="search_box" type="text" placeholder="Search" name="search" />
												<!--button type="submit"><i class="fa fa-search"></i></button-->
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/header-bottom-->
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
									<a href="/cart/">
										<i class="fa fa-shopping-cart"></i> Корзина
										<span id="cart-count">(<?php echo Cart::countItems(); ?>)</span>
									</a>
								</li>
								<?php if (User::isGuest()) : ?>
									<li><a href="/user/login/"><i class="fa fa-lock"></i>Вход</a></li>
									<li><a href="/user/register/"><i class="fa fa-lock"></i>Регистрация</a></li>
								<?php else : ?>
									<li><a href="/cabinet/"><i class="fa fa-user"></i>Аккаунт</a></li>
									<li><a href="/user/logout/"><i class="fa fa-lock"></i>Выход</a></li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->
	</header>
	<!--/header-->