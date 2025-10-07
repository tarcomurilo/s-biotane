<?php 
/**
 * Enqueue scripts and styles.
 */
function ecofine_scripts() {
	global $wp_query;
	if ( is_rtl() ) {
		wp_enqueue_style('bootstrap-rtl', get_theme_file_uri('assets/bootstrap/bootstrap-rtl-min.css'), array(),  ECOFINE_VERSION, 'all');
	}else{
		wp_enqueue_style('bootstrap', get_theme_file_uri('assets/bootstrap/bootstrap-min.css'), array(),  ECOFINE_VERSION, 'all');
	}
	wp_enqueue_style('bootstrap-icons', get_theme_file_uri('assets/bootstrap/bootstrap-icons.css'), array(),  ECOFINE_VERSION, 'all');
	wp_enqueue_style('magnific-popup', get_theme_file_uri('assets/popup/magnific-popup.css'), array(), ECOFINE_VERSION , 'all');
	wp_enqueue_style('slick', get_theme_file_uri('assets/slick/slick.css'), array(), ECOFINE_VERSION , 'all');
	wp_enqueue_style('ecofine-typography', get_theme_file_uri('assets/css/typography.css'), array(), ECOFINE_VERSION , 'all');
	wp_enqueue_style('fontawesome-all', get_theme_file_uri('assets/css/fontawesome-all.css'), array(),  ECOFINE_VERSION , 'all');
    wp_enqueue_style('animation', get_theme_file_uri('assets/css/animation.css'), array(),  ECOFINE_VERSION , 'all'); 
	wp_enqueue_style('ecofine-theme', get_theme_file_uri('assets/css/theme.css'), array(), ECOFINE_VERSION , 'all');
	wp_enqueue_style('ecofine-style', get_stylesheet_uri(), array(), ECOFINE_VERSION, 'all');
	wp_style_add_data( 'ecofine-style', 'rtl', 'replace' );

	if( !class_exists( 'CSF' ) ) {
		wp_enqueue_style( 'ecofine-default-fonts', '//fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', '', '1.0.0', 'screen' );
	}

	//Enqueue scripts.
	wp_enqueue_script('popper', get_theme_file_uri('assets/bootstrap/popper-min.js'), array(),  ECOFINE_VERSION, true);
	wp_enqueue_script('bootstrap', get_theme_file_uri('assets/bootstrap/bootstrap-min.js'), array(), ECOFINE_VERSION, true);
	wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('assets/popup/jquery-magnific-popup-min.js'), array('jquery'), ECOFINE_VERSION , true);
	wp_enqueue_script('slick-min', get_theme_file_uri('assets/slick/slick-min.js'), array(), ECOFINE_VERSION , true);
	wp_enqueue_script('ecofine-theme', get_theme_file_uri('assets/js/theme.js'), array('jquery'), ECOFINE_VERSION , true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecofine_scripts' );
?>