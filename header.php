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

<nav class="nav">
	<div class="nav-left">
		<span class="nav-item">
			<a class="button" <a href="<?php echo wc_get_cart_url(); ?>"><span class="icon"><i class="fa fa-shopping-basket"></i></span><span><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> | <?php echo WC()->cart->get_cart_total(); ?></span></a>
		</span>
	</div>

	<span class="nav-toggle">
		<span></span>
		<span></span>
		<span></span>
	</span>

	<div class="nav-right nav-menu">
		<span class="nav-item">
			<a class="button" href="https://www.twitter.com/bednbreakfasttt/" target="_blank">
				<span class="icon">
					<i class="fa fa-twitter"></i>
				</span>
				<span>Twitter</span>
			</a>
			<a class="button" href="https://www.instagram.com/bednbreakfasttt/" target="_blank">
				<span class="icon">
					<i class="fa fa-instagram"></i>
				</span>
				<span>Instagram</span>
			</a>
			<a class="button" href="https://www.littlenans.co.uk/roasttts/" target="_blank">
				<span class="icon">
					<i class="fa fa-cutlery"></i>
				</span>
				<span>Little Nans</span>
			</a>
			<a class="button" href="/contact-us/">
				<span class="icon">
					<i class="fa fa-envelope"></i>
				</span>
				<span>Contact Us</span>
			</a>
		</span>
	</div>
</nav>

<section class="hero is-light">
	<div class="hero-body">
		<div class="container">
			<div class="columns is-vcentered has-text-centered">
				<div class="column">
					<h1 class="title"><a href="<?php echo get_bloginfo('wpurl'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="logo" width="180" height="177"></a></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="hero-foot">
		<div class="container">
			<nav class="tabs is-boxed">
			<?php wp_nav_menu( array(
				'menu' => 'Header Menu',
				'container_class' => ''
			) ); ?>
			</nav>
		</div>
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