<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();
global $post;

if ( ! $post->post_excerpt ) {
	return;
}
?>

<section class="section">
	<div class="container">
			<?php
$i = 1;
//added before to ensure it gets opened
echo '<div class="columns">';
if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
     // post stuff...
?>
			<div class="column is-one-third">

				<div class="card">
					<header class="card-header is-light">
						<p class="card-header-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</p>
						<a class="card-header-icon" href="<?php echo $term_link; ?>">
							<span class="icon">
								<i class="fa fa-angle-right"></i>
							</span>
			    		</a>
					</header>
					<div class="card-image">
						<figure class="image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</figure>
					</div>
					<div class="card-content">
						<div class="content">
							<p class="title"><?php echo $product->get_price_html(); ?></p>
		<div class="stars">
			<?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
				return;
			?>

			<?php if ( $rating_html = $product->get_rating_html() ) : ?>
				<?php echo $rating_html; ?>
			<?php endif; ?>
		</div>
							<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
						</div>
					</div>
					<footer class="card-footer is-light">
						<a class="card-footer-item" href="<?php the_permalink(); ?>">Order Now</a>
					</footer>
				</div>

			</div>
<?php
     // if multiple of 3 close div and open a new div
     if($i % 3 == 0) {echo '</div><div class="columns">';}

$i++; endwhile; endif;
//make sure open div is closed
echo '</div>';
			?>
	</div>
</section>

<?php get_footer(); ?>