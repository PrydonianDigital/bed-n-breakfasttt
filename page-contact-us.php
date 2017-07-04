<?php get_header(); ?>

<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column has-text-left content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<form class="col s12" id="ajax-contact" method="post" action="<?php bloginfo('template_directory'); ?>/mailer.php">
						<div class="field">
							<p class="control">
							<label class="label" for="name" data-error="Please enter your name" data-success="">Name</label>
							<input id="name" name="name" type="text" class="input-text validate" placeholder="Your Name">
							</p>
						</div>
						<div class="field">
							<p class="control">
							<label class="label" for="email" data-error="Please enter your email" data-success="">Email</label>
							<input id="email" name="email" type="email" class="input-text validate" placeholder="Your Email">
							</p>
						</div>
						<div class="field">
							<p class="control">
							<label class="label" for="message" data-error="Please enter your message" data-success="">Message</label>
							<textarea id="message" name="message" class="textarea validate" placeholder="Your Message"></textarea>
							</p>
						</div>
						<div class="g-recaptcha" data-sitekey="6LdsuR4UAAAAALeZbduWjzFh7e7bp70q2NoAFQvd"></div>

						<div class="field">
							<p class="control">
								<br />
								<button class="button is-primary" type="submit">Submit</button>
							</p>
						</div>
						<p id="form-messages" class="help"></p>
					</form>

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