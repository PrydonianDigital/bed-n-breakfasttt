<?php

	// Set content width value based on the theme's design
	if ( ! isset( $content_width ) )
		$content_width = 1344;

	// Register Theme Features
	function bnb_theme()  {
		show_admin_bar(false);
		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );
		// Add theme support for document Title tag
		add_theme_support( 'title-tag' );
		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_action( 'after_setup_theme', 'woocommerce_support' );
		function woocommerce_support() {
		    add_theme_support( 'woocommerce' );
		}
	}
	add_action( 'after_setup_theme', 'bnb_theme' );

	// Register Style
	function bnb_css() {
		wp_register_style( 'gf', '//fonts.googleapis.com/css?family=Montserrat:400,500,700', false, '4.7.0' );
		wp_register_style( 'fa', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0' );
		wp_register_style( 'bnbcss', get_template_directory_uri() . '/css/bulma.css', false, '0.4' );
		wp_enqueue_style( 'gf' );
		wp_enqueue_style( 'fa' );
		wp_enqueue_style( 'bnbcss' );
	}
	add_action( 'wp_enqueue_scripts', 'bnb_css' );

	// Register Script
	function bnb_js() {
		wp_register_script( 'bnbjs', get_template_directory_uri() . '/js/bnb.js', false, '1.0', true );
		wp_enqueue_script( 'bnbjs' );
	}
	add_action( 'wp_enqueue_scripts', 'bnb_js' );

	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );
	function add_active_class($classes, $item) {
		if(
			in_array( 'current-menu-item', $classes ) ||
			in_array( 'current-menu-ancestor', $classes ) ||
			in_array( 'current-menu-parent', $classes ) ||
			in_array( 'current_page_parent', $classes ) ||
			in_array( 'current_page_ancestor', $classes )
		) {
			$classes[] = "is-active";
		}
		return $classes;
	}

	// Register Navigation Menus
	function bnb_menus() {
		$locations = array(
			'header' => __( 'Header Menu', 'bnb' ),
			'side' => __( 'Side Menu', 'bnb' ),
			'footer' => __( 'Footer Menu', 'bnb' ),
		);
		register_nav_menus( $locations );
	}
	add_action( 'init', 'bnb_menus' );

	function bnb_sidebars() {
		$args = array(
			'id'			=> 'right',
			'class'		 => 'right',
			'name'		  => __( 'Right Sidebar', 'ch' ),
			'before_widget' => '<div class="card">',
			'after_widget' => '</div></div>',
			'before_title' => '<header class="card-header"><p class="card-header-title">',
			'after_title' => '</p></header><div class="card-content">',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'fleft',
			'class'		 => 'left',
			'name'		  => __( 'Footer Left Sidebar', 'ch' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<p class="title">',
			'after_title' => '</p>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'fright',
			'class'		 => 'right',
			'name'		  => __( 'Footer Right Sidebar', 'ch' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<p class="title">',
			'after_title' => '</p>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'cookies',
			'class'		 => 'left',
			'name'		  => __( 'Cookies Sidebar', 'ch' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<p class="title">',
			'after_title' => '</p>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'bnb_sidebars' );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 5 );

	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
		<a class="button" <a href="<?php echo wc_get_cart_url(); ?>"><span class="icon"><i class="fa fa-shopping-basket"></i></span><span><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> | <?php echo WC()->cart->get_cart_total(); ?></span></a>
		<?php
		$fragments['a.cart-customlocation'] = ob_get_clean();
		return $fragments;
	}

add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'input' );
  return $args;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}

function register_accepted_order_status() {
    register_post_status( 'wc-accepted', array(
        'label'                     => 'Accepted',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Accepted <span class="count">(%s)</span>', 'Accepted <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_accepted_order_status' );

// Add to list of WC Order statuses
function add_accepted_to_order_statuses( $order_statuses ) {

    $new_order_statuses = array();

    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {

        $new_order_statuses[ $key ] = $status;

        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-accepted'] = 'Accepted';
        }
    }

    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_accepted_to_order_statuses' );

