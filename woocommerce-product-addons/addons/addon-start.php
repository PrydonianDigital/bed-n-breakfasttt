<div class="<?php if ( 1 == $required ) echo 'required-product-addon'; ?> media product-addon product-addon-<?php echo sanitize_title( $name ); ?>">
<div class="media-content">
	<?php do_action( 'wc_product_addon_start', $addon ); ?>

	<?php if ( $name ) : ?>
		<div class="addon-title"><strong><?php echo wptexturize( $name ); ?> <small><?php if ( 1 == $required ) echo '<abbr class="required" title="' . __( 'Required field', 'woocommerce-product-addons' ) . '">*</abbr>'; ?> <i class="fa fa-plus"></i></small></strong></div>
	<?php endif; ?>

	<?php if ( $description ) : ?>
		<?php echo '<div class="addon-description">' . wpautop( wptexturize( $description ) ) . '</div>'; ?>
	<?php endif; ?>

	<?php do_action( 'wc_product_addon_options', $addon ); ?>
