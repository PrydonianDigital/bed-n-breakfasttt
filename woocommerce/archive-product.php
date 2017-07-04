<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column is-1">
				<aside class="menu">
					<p class="menu-label">
						Menu
					</p>
					<?php wp_nav_menu( array(
						'menu' => 'Side Menu',
						'container_class' => 'menu-list'
					) ); ?>
				</aside>
			</div>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="column">
					<div class="card">
						<header class="card-header">
							<p class="card-header-title">
								<a href="<?php echo $term_link; ?>"><?php echo $taxonomy->name; ?></a>
							</p>
							<a class="card-header-icon" href="<?php echo $term_link; ?>">
								<span class="icon">
									<i class="fa fa-angle-right"></i>
								</span>
				    		</a>
						</header>
						<div class="card-image">
							<figure class="image is-4by3">
								<a href="<?php echo $term_link; ?>"><img src="<?php echo $taxonomy_img; ?>" alt="<?php echo $taxonomy->name; ?>" /></a>
							</figure>
						</div>
						<div class="card-content">
							<div class="content">
								<?php echo $taxonomy->description; ?>
							</div>
						</div>
						<footer class="card-footer">
							<a class="card-footer-item" href="<?php echo $term_link; ?>">Select options</a>
						</footer>
					</div>
				</div>
				<?php endwhile; ?>

				<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>