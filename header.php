<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<section class="has-text-right">
	<a class="button" href="/basket/"><span class="icon"><i class="fa fa-shopping-basket"></i></span><span><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> | <?php echo WC()->cart->get_cart_total(); ?></span></a>
</section>

<section class="hero is-light has-text-centered">
	<h1><a href="<?php echo get_bloginfo('wpurl'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="logo" width="180" height="177"></a></h1>
</section>

<section class="has-text-centered">
	<div class="container">
		<?php wp_nav_menu( array(
			'menu' => 'Header Menu',
			'container_class' => 'tabs'
		) ); ?>
	</div>
</section>

<section class="has-text-centered">
	<div class="container">
		<?php wp_nav_menu( array(
			'menu' => 'Side Menu',
			'container_class' => 'tabs'
		) ); ?>
	</div>
</section>

