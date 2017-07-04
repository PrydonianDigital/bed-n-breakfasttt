<?php get_header(); ?>

<section class="section">
	<div class="container">
		<div class="columns">
			<?php
				$args = array(
					'taxonomy'		=> 'product_cat',
					'parent'		=> 0,
					'hide_empty'	=> false,
					'order'			=> 'DESC'
				);
				$taxonomies = get_terms( $args );
				if  ($taxonomies) {
					foreach ($taxonomies as $taxonomy ) {
						$thumb_id = get_woocommerce_term_meta( $taxonomy->term_id, 'thumbnail_id', true );
						$taxonomy_img = wp_get_attachment_url(  $thumb_id );
						$term_link = get_term_link( $taxonomy, 'product_cat' );
			?>
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
						<a class="card-footer-item" href="<?php echo $term_link; ?>">Order Now</a>
					</footer>
				</div>
			</div>
			<?php
				}
			}
			?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>

			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>