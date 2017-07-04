<?php get_header(); ?>

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
					<div class="columns">
						<div class="column is-quarter">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>