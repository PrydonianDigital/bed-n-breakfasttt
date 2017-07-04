<footer class="hero is-light">
	<div class="hero-body">
		<div class="container">
			<div class="columns is-vcentered has-text-centered">
				<div class="column">

					<div class="sidebar">
						<?php if ( ! dynamic_sidebar('fleft') ) : ?>
							<nav class="panel">{static sidebar item 1}</nav>
						<?php endif; ?>
					</div>

				</div>
				<div class="column">

					<div class="sidebar">
						<?php if ( ! dynamic_sidebar('fright') ) : ?>
							<nav class="panel">{static sidebar item 1}</nav>
						<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="hero-foot">
		<div class="container">
			<nav class="tabs is-boxed">
			<?php wp_nav_menu( array(
				'menu' => 'Footer Menu',
				'container_class' => ''
			) ); ?>
			</nav>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>