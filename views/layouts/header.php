<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Лекарства</title>
	<link href="/template/css/bootstrap.min.css" rel="stylesheet">
	<link href="/template/css/font-awesome.min.css" rel="stylesheet">
	<link href="/template/css/my.css" rel="stylesheet">
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

	<script src="/template/js/jquery.js"></script>
	<script defer src="/template/js/bootstrap.min.js"></script>
	<script defer src="/template/js/jquery.scrollUp.min.js"></script>
	<script defer src="/template/js/price-range.js"></script>
	<script defer src="/template/js/jquery.prettyPhoto.js"></script>
	<script defer src="/template/js/main.js"></script>
	<script defer src="/resources/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script defer src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script src="/components/main.js"></script>
	<script defer src="/resources/ZoomL/zoomsl-3.0.min.js"></script>

</head>
<!--/head-->

<body style="min-height:100%; position:relative; padding-bottom: 70px; ">
	<header id="header">
		<!--header-->

		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<!--a class="logo" href="/"><img src="/template/images/home/main_logo.png" alt="" /></a-->
						</div>
					</div>
				</div>
			</div>
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
								<li class="dropdown"><a href="/discounts/page-1">Скидки<i class="fa fa-angle-down_"></i></a>
								</li>
								<li><a href="/about/">О магазине</a></li>														
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form id="search" action="/search" method="post" enctype="multipart/form-data">
								<input id="search_box" type="text" placeholder="Поиск" name="search" />
								<!--button type="submit"><i class="fa fa-search"></i></button-->
							</form>
						</div>
					</div>
					<div class="col-sm-8 pull-right">
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
		<!--/header-bottom-->
		<!--/header-middle-->
	</header>
	<!--/header-->