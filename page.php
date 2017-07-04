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
			<div class="column is-one-third">
				<div class="sidebar">
					<?php if ( ! dynamic_sidebar('right') ) : ?>
						<nav class="panel">
							{static sidebar item 1}
							<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/BedNBreakfasttt" data-widget-id="588628445342654464">Tweets by @BedNBreakfasttt</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>