<!doctype html>
<html lang="ru">
<head>
	<title>PROFi - Консалтинговое бюро</title>
	<meta charset="UTF-8">
	<!-- /enable css -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico">
	<!-- enable responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Консалтинговое бюро «Профи»">
	<!-- /enable responsive -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- wrapper -->
	<div class="wrapper">

		<!-- header -->
		<header class="header">
            <div class="container header__container">
                <div class="header__logo">
                    <picture>
                        <source class="lazy" data-srcset="<?php echo get_template_directory_uri(); ?>/img/icons/logo-profi.webp" type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/img/icons/loading.gif">
                        <img data-src="<?php echo get_template_directory_uri(); ?>/img/icons/logo-profi.png" class="lazy" alt="логотип PROFi" src="<?php echo get_template_directory_uri(); ?>/img/icons/loading.gif">
                    </picture>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li><a href="" data-goto=".service" class="header__link">Наши услуги</a></li>
                        <li><a href="" data-goto=".about" class="header__link">О нас</a></li>
                        <li><a href="" data-goto=".guarantee" class="header__link">Гарантии</a></li>
                        <li><a href="" data-goto=".footer" class="header__link">Контакты</a></li>
                    </ul>
                </nav>
                <div class="header__btns">
                    <a href="" data-goto=".request" class="btn">Написать нам</a>
                    <div class="header__burger menu__icon"><span></span></div>
                </div>
            </div>
        </header>
		<!-- /header -->
