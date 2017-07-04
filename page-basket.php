<?php get_header(); ?>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column has-text-left content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>